<?php

/**
 * ResourceController.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Controller;

// - ZF2 - //
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

// - Shared - //
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\JSonResponse;
use API\REST\V1\Shared\Functions\ArrayManage;
// - Propel - //
use Client;
use ClientQuery;
use BasePeer;

/**
 * Class APIController
 * @package API\REST\V1\Controller
 */
class ResourceController extends AbstractRestfulController
{

    /**
     * @var arra
     */
    protected $collectionOptions = array('GET','POST');
    /**
     * @var array
     */
    protected $entityOptions = array('GET', 'PATCH', 'PUT', 'DELETE');
    /**
     * @var array
     */
    protected $getFilters = array('neq','in','gt','lt','from','to','like');

    /**
     * @return array
     */
    public function _getOptions()
    {
        if($this->params()->fromRoute('id',false)){
            //Recibimos un ID, Retornamos un item en especifico
            return $this->entityOptions;
        }
        //De lo contrario retornamos una colección
        return $this->collectionOptions;
    }

    /**
     * @return mixed|\Zend\Mvc\Controller\Plugin\Params
     */
    public function getToken(){
        return $this->params('token');
    }

    /**
     * @return mixed|JsonModel
     */
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
                'More Info' => URL_API_DOCS.'/'.table
            ),
        );
        return new JsonModel($body);
    }

    /**
     * @param mixed $data
     * @return mixed|JsonModel
     */
    public function create($data) {
        
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resource = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            
            $request = $this->getRequest();
            $response = $this->getResponse();

            $dataArray = HttpRequest::resourceData($data, $request, $response, $resource);

            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormPostPut = ResourceManager::getResourceFormPostPut($resource);
            $FormPostPut = $resourceFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $FormPostPut->setData($dataArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $resourceFilterPostPut = ResourceManager::getResourceFilterPostPut($resource);
            
            //Le ponemos el filtro a nuestro formulario
            $FilterPostPut = $resourceFilterPostPut;
            $FormPostPut->setInputFilter($FilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($FormPostPut->isValid()){
                $resource = ResourceManager::getResource($resource);
                $resourceArray = $resource->toArray(BasePeer::TYPE_FIELDNAME);

                $responseArray = array();
                foreach ($FormPostPut->getElements() as $keyElement => $valueElement){
                    $responseArray[$keyElement] = $resourceArray[$keyElement];
                }
                foreach ($dataArray as $dataKey => $dataValue){
                    if(!is_null($dataValue)){
                        $responseArray[$dataKey] = $dataArray[$dataKey];
                    }               
                }

                // Ingresamos al objeto del recurso directamente en la clase de Propel
                $issave = $resource->saveResouce($responseArray,$idCompany,$userLevel);

                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode($issave['statusCode']); //BAD REQUEST
                return new JsonModel($issave['bodyResponse']);
            //Si el formulario no fue valido
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($FormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                return new JsonModel(JSonResponse::getResponseBody(400, $messageArray));
            }
        //Si el usuario no tiene permisos sobre el recurso
        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            return new JsonModel(JSonResponse::getResponseBody(403));
        }
    }

    public function get($id) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resource = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormGET = ResourceManager::getResourceFormGET($resource);
            $resourceFormGET = $resourceFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
            $allowedColumns = array();
            foreach ($resourceFormGET->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            $resourceQuery = ResourceManager::getResourceQuery($resource);
            $result = ArrayManage::getIdCompanyForListId($resourceQuery, $idCompany, $id);
            if($result!=null){

                $Response = ArrayManage::getResourceResultId($id, $resourceFormGET, $resourceQuery, $result, $userLevel);

                return new JsonModel($Response);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id '.RESOURCE,
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

    /**
     * @return mixed|JsonModel
     */
    public function getList() {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resource = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormGET = ResourceManager::getResourceFormGET($resource);
            $resourceFormGET = $resourceFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
            $allowedColumns = array();
            foreach ($resourceFormGET->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit = (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit > 100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir = $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'id'.RESOURCE;
            $page = (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters != null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            // Instanciamos la Query de cada recurso de Propel. Por ejemplo: ClientQuery, BranchQuery, ExpensetransactionfileQuery, etc.
            $resourceQuery = ResourceManager::getResourceQuery($resource);

            $result = ArrayManage::executeQuery($resourceQuery, RESOURCE, $idCompany, $page, $limit, $filters, $order, $dir);

            $Response = ArrayManage::getResourceResult($resourceFormGET, $resourceQuery, $result, $userLevel);

            return new JsonModel($Response);

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