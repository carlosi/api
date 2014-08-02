<?php

namespace Expense\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Expense\ACL\ExpenseRecurrency\Form\ExpenseRecurrencyFormGET;
use Expense\ACL\ExpenseItem\Form\ExpenseItemFormGET;
//==============FILTERS==============

//=============PROPEL===============
use ExpenserecurrencyQuery;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\Functions\ArrayManage;
use Shared\Functions\SessionManager;

class ExpenseRecurrencyController extends AbstractRestfulController
{
    protected $table = 'expenserecurrency';
    protected $collectionOptions = array('GET');
    protected $entityOptions = array('GET', 'POST', 'PUT', 'DELETE');
    protected $getFilters = array('neq','in','gt','lt','from','to','like');

    public function _getOptions()
    {
        if($this->params()->fromRoute('id',false)){
            //Recibimos un ID, Retornamos un item en especifico
            return $this->entityOptions;
        }
        //De lo contrario retornamos una collecion
        return $this->collectionOptions;
    }

    public function getQuery(){
        return new ExpenserecurrencyQuery();
    }

    public function getToken(){
        return $this->params('token');
    }

    public function options()
    {
        $response = $this->getResponse();

        $response->getHeaders()
            ->addHeaderLine('Allow', implode(',', $this->_getOptions()));

        //Retornamos la respuesta
        $body = array(
            'Success' => array(
                'HTTP Status' => '200' ,
                'Allow' => implode(',', $this->_getOptions()),
                'More Info' => WEBSITE_API_DOCS.'/useracl'
            ),
        );
        return new JsonModel($body);
    }

    public function getList() {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
            $expenserecurrencyForm = ExpenserecurrencyFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($expenserecurrencyForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idexpenserecurrency';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $expenserecurrencyArray = array();

            foreach ($result['data'] as $item){
                $expenserecurrency = ExpenseRecurrencyQuery::create()->filterByIdexpenserecurrency($item['idexpenserecurrency'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idexpenserecurrency']),
                    ),
                );
                foreach ($expenserecurrencyForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idexpenseitem']);
                //Agregamos el campo embedded a nuestro arreglo
                $expenseitem = $expenserecurrency->getExpenseitem()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $expenseitemForm = ExpenseItemFormGET::init($userLevel);
                $expenseitemArray = array();
                foreach ($expenseitemForm->getElements() as $key=>$value){
                    $expenseitemArray[$key] = $expenseitem[$key];
                }

                $row['_embedded'] = array(
                    'expenseitem' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/expenseitem/'.$expenserecurrency->getIdexpenseitem()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($expenseitemArray as $key=>$value){
                    $row['_embedded']['expenseitem'][$key] = $value;
                }
                array_push($expenserecurrencyArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'resume' => $result['resume'],
                '_embedded' => array('expenserecurrency'=> $expenserecurrencyArray),
            );

            return new JsonModel($response);

        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }
}
