<?php

namespace Expense\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Expense\V1\REST\ACL\BankExpenseTransaction\Form\BankExpenseTransactionFormGET;
use Company\V1\REST\ACL\BankAccount\Form\BankAccountFormGET;
use Expense\V1\REST\ACL\ExpenseTransaction\Form\ExpenseTransactionFormGET;
//==============FILTERS==============

//=============PROPEL===============
use BankexpensetransactionQuery;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;

class BankExpenseTransactionController extends AbstractRestfulController
{
    protected $table = 'bankexpensetransaction';
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
        return new BankexpensetransactionQuery();
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
                'More Info' => WEBSITE_API_DOCS.'/'.$this->table
            ),
        );
        return new JsonModel($body);
    }

    public function get($id) {

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
            $bankexpensetransactionForm = BankExpenseTransactionFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($bankexpensetransactionForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            if($result!=null){
                $bankexpensetransaction = $this->getQuery()->create()->filterByIdbankexpensetransaction($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $bankexpensetransactionArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'. $this->table.'/'.$id,
                    ),
                );
                foreach ($bankexpensetransactionForm->getElements() as $key=>$value){
                    $mxtaxdocumentArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($bankexpensetransactionArray['idbankaccount']);
                unset($bankexpensetransactionArray['idexpensetransaction']);

                //Agregamos el campo embedded a nuestro arreglo
                $bankaccount = $bankexpensetransaction->getBankaccount()->toArray(BasePeer::TYPE_FIELDNAME);
                $expensetransaction = $bankexpensetransaction->getExpensetransaction()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clienttaxGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $bankaccountForm   = BankAccountFormGET::init($userLevel);

                //Instanciamos nuestro formulario orderGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $expensetransactionForm   = ExpenseTransactionFormGET::init($userLevel);

                $bankaccountArray = array();
                foreach ($bankaccountForm->getElements() as $key=>$value){
                    $bankaccountArray[$key] = $bankaccount[$key];
                }
                $expensetransactionArray = array();
                foreach ($expensetransactionForm->getElements() as $key=>$value){
                    $expensetransactionArray[$key] = $expensetransaction[$key];
                }

                $bankexpensetransactionArray ['_embedded'] = array(
                    'bankaccount' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/bankaccount/'.$bankexpensetransaction->getIdbankaccount()),
                        ),
                    ),
                    'expensetransaction' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/expensetransaction/'.$bankexpensetransaction->getIdbankexpensetransaction()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded']['clienttax']
                foreach ($bankaccountArray as $key=>$value){
                    $bankexpensetransactionArray ['_embedded']['bankaccount'][$key] = $value;
                }
                //Agregamos los datos de client a nuestro arreglo $row['_embedded']['order']
                foreach ($expensetransactionArray as $key=>$value){
                    $bankexpensetransactionArray ['_embedded']['expensetransaction'][$key] = $value;
                }

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();

                foreach ($bankexpensetransactionForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el idbankaccount si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idbankaccount',$acl)){
                    unset($acl['idbankaccount']);
                    $bankaccountColumns = array();
                    foreach ($bankaccountForm->getElements() as $element){
                        $bankaccountColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                //Eliminamos el idexpensetransaction si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idexpensetransaction',$acl)){
                    unset($acl['idexpensetransaction']);
                    $expensetransactionColumns = array();
                    foreach ($expensetransactionForm->getElements() as $element){
                        $expensetransactionColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }

                $acl['_embedded'] = array(
                    'bankaccount' =>  $bankaccountColumns,
                    'expensetransaction' =>  $expensetransactionColumns,
                );

                if(isset($acl)){
                    $bankexpensetransactionArray['ACL'] = $acl;
                }

                return new JsonModel($bankexpensetransactionArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idbankexpensetransaction',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //ACCESS DENIED
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