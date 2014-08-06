<?php

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\ACL\BranchUser\Form\BranchUserFormGET;
use Company\ACL\User\Form\UserFormGET;
use Company\ACL\Branch\Form\BranchFormGET;
//==============FILTERS==============

//=============PROPEL===============
use BranchUserQuery;
use BranchUser;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\Functions\ArrayManage;
use Shared\Functions\SessionManager;

class BranchUserController extends AbstractRestfulController
{
    protected $table = 'branch_user';
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
        return new BranchUserQuery;
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
                'More Info' => URL_API_DOCS.'/useracl'
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
            $branchuserForm = BranchUserFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($branchuserForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idbranch_user';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $branchuserArray = array();

            foreach ($result['data'] as $item){
                $branchuser = BranchUserQuery::create()->filterByIdbranchUser($item['idbranch_user'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => URL_API.'/'.$this->table.'/'.$item['idbranch_user']),
                    ),
                );
                foreach ($branchuserForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idbranch']);
                unset($row['iduser']);
                //Agregamos el campo embedded a nuestro arreglo
                $branch = $branchuser->getBranch()->toArray(BasePeer::TYPE_FIELDNAME);
                $user = $branchuser->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $branchForm = BranchFormGET::init($userLevel);
                $branchArray = array();
                foreach ($branchForm->getElements() as $key=>$value){
                    $branchArray[$key] = $branch[$key];
                }

                $userForm = UserFormGET::init($userLevel);
                $userArray = array();
                foreach ($userForm->getElements() as $key=>$value){
                    $userArray[$key] = $user[$key];
                }

                $row['_embedded'] = array(
                    'user' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/user/'.$branchuser->getIdUser()),
                        ),
                    ),
                    'branch' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/branch/'.$branchuser->getIdbranch()),
                        ),
                    ),
                );

                //Agregamos los datos de branch a nuestro arreglo $row['_embedded'][company']
                foreach ($branchArray as $key=>$value){
                    $row['_embedded']['branch'][$key] = $value;
                }
                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($userArray as $key=>$value){
                    $row['_embedded']['user'][$key] = $value;
                }
                array_push($branchuserArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'resume' => $result['resume'],
                '_embedded' => array('branchuser'=> $branchuserArray),
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
