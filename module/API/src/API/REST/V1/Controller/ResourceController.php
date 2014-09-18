<?php
/**
 * ResourceController.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
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
use API\REST\V1\Shared\Functions\ArrayResponse;
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
        return $this->getRequest()->getHeader('Authorization')->getFieldValue();
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
                'HTTP_Status' => '200' ,
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

        if(RESOURCE_CHILD != null){

            return $this->createResourceChildAction($data);

        }

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto request
        $request = $this->getRequest();

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = MODULE_RESOURCE;

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormPostPut = ResourceManager::getResourceFormPostPut($resourceName);
            $FormPostPut = $resourceFormPostPut::init($userLevel);

            $resource = ResourceManager::getResource($resourceName);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $dataArray = HttpRequest::resourceData($data, $request, $response, $resourceName);

            // Si $dataArray nos retorna un error
            if(isset($dataArray['Error'])){
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($dataArray));
                        break;
                    }
                    case "json":{
                        return new JsonModel($dataArray);
                        break;
                    }
                    default: {
                    return new JsonModel($dataArray);
                    break;
                    }
                }
            }

            $resourceArray = $resource->toArray(BasePeer::TYPE_FIELDNAME);
            if(isset($data)){
                // Le ponemos los datos a por defecto de nuestro recurso a nuestro formulario
                foreach ($resourceArray as $key => $value){
                    if(!is_null($value) && is_null($dataArray[$key])){
                        $dataArray[$key] = $value;
                    }
                }
            }
            //Le ponemos los datos a nuestro formulario
            $FormPostPut->setData($dataArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $resourceFilterPostPut = ResourceManager::getResourceFilterPostPut($resourceName);

            //Le ponemos el filtro a nuestro formulario
            $FilterPostPut = $resourceFilterPostPut;
            $FormPostPut->setInputFilter($FilterPostPut->getInputFilter($userLevel));

            //Si los valores son validos
            if($FormPostPut->isValid()){

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
                // $data solo es alternativo, lo utiliza algunos objetos solamente, como department.
                $issave = $resource->saveResouce($responseArray,$idCompany,$userLevel, $data);

                //Modifiamos el Header de nuestra respuesta
                $response->setStatusCode($issave['statusCode']); //BAD REQUEST

                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($issave['bodyResponse']));
                        break;
                    }
                    case "json":{
                        return new JsonModel($issave['bodyResponse']);
                        break;
                    }
                    default: {
                    return new JsonModel($issave['bodyResponse']);
                    break;
                    }
                }
                //Si el formulario no fue valido
            }else{
                //Modifiamos el Header de nuestra respuesta
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
                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString(ArrayResponse::getResponseBody(400, $messageArray)));
                        break;
                    }
                    case "json":{
                        return new JsonModel(ArrayResponse::getResponseBody(400, $messageArray));
                        break;
                    }
                    default: {
                    return new JsonModel(ArrayResponse::getResponseBody(400, $messageArray));
                    break;
                    }
                }
            }
            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{
                    // Create the config object
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }        }
    }

    public function get($id){

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = MODULE_RESOURCE;

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            //Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);
            $isIdValid = $resource->isIdValidResource($id,$idCompany);
            if($isIdValid){

                //Obtenemos nuestra entidad padre
                $entity = $resource->getEntity($id);

                //Llamamos a la funcion entityResponse para darle formato a nuestra respuesta
                $bodyResponse = $resource->getEntityResponse($entity,$userLevel);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $response = $this->getResponse();
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid '.RESOURCE.' id',
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
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

        // Instanciamos el objeto Response, el cual utilizamos en las respuestas
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = MODULE_RESOURCE;

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro Recurso
            $resource = ResourceManager::getResource($resourceName);

            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormGET = ResourceManager::getResourceFormGET($resourceName);
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

            $getCollection = $resource->getCollection($idCompany, $page, $limit, $filters, $order, $dir);

            if(!empty($getCollection['data'])){
                // Si el recurso que solicitan es Company
                if(RESOURCE == 'company'){
                    // Solamente el idcompany == 1 podrá listar todas la Compañias existentes
                    if($idCompany == 1){
                        return new JsonModel($getCollection);
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 403 . ' Forbidden',
                                'Title' => 'Access denied',
                                'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                            ),
                        );
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                // Create the config object
                                $response = $this->getResponse();
                                $writer = new \Zend\Config\Writer\Xml();
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            return new JsonModel($bodyResponse);
                            break;
                            }
                        }
                    }
                }else{

                    $bodyResponse = $resource->getCollectionResponse($getCollection, $userLevel);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            // Create the config object
                            $response = $this->getResponse();
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                    return new JsonModel($Response);
                }
            }else{

                //Modifiamos el Header de nuestra respuesta
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //No Content
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'No Content',
                        'Details' => 'The server successfully processed the request, but is not returning any content.',
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $response = $this->getResponse();
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP_Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            switch(TYPE_RESPONSE){
                case "xml":{
                    // Create the config object
                    $response = $this->getResponse();
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }

    /**
     * @param mixed $data
     * @return mixed|JsonModel
     */
    public function update($id, $data) {

        if(RESOURCE_CHILD != null){

            return $this->updateResourceChildAction($data);

        }
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resourceName);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            $resource = ResourceManager::getResource($resourceName);
            $request = $this->getRequest();
            $response = $this->getResponse();

            $functionUpdate = $resource->updateResource($id, $data, $idCompany, $userLevel, $request, $response);

            switch(TYPE_RESPONSE){
                case "xml":{
                    // Create the config object
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($functionUpdate));
                    break;
                }
                case "json":{
                    return new JsonModel($functionUpdate);
                    break;
                }
                default: {
                return new JsonModel($functionUpdate);
                break;
                }
            }

            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{
                    // Create the config object
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }

    /**
     * @param mixed $id
     * @return mixed|JsonModel
     */
    public function delete($id) {

        if(RESOURCE_CHILD != null){

            return $this->deleteResourceChildAction($id);

        }

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resourceName);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            //Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);

            //Verificamos si el id que se quiere eliminar pertenece a la compañia
            if($resource->isIdValidResource($id,$idCompany)){
                if($resource->deleteEntity($id,$userLevel)){
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_204); //NOT CONTENT
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid id',
                        ),
                    );
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id'.RESOURCE,
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{
                    // Create the config object
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }

    /////////// Start create ResourceChild or Resource Relational  ///////////
    /**
     * @return mixed|JsonModel
     */
    public function createResourceChildAction($data){

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto request
        $request = $this->getRequest();

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        if(RESOURCE_CHILD!=null){
            // Almacenamos el nombre del resourceChild (Ejemplo: Clientaddress, Clientfile, etc...)
            $resourceName = NAME_RESOURCE_CHILD;
            $module = MODULE_RESOURCE_CHILD;
        }else{
            // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
            $module = MODULE_RESOURCE;
        }

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Obtenemos el nombre de nuestro recursoChild
            $resourcenameChild = RESOURCE_CHILD;

            $resource = ResourceManager::getResource($resourceName);

            if($resource->isIdValidResource(ID_RESOURCE,$idCompany)){

                ////// Start Resource Relational //////
                if(RESOURCE_CHILD == 'department'){
                    if($resource->isIdValidResurceChild(ID_RESOURCE, ID_RESOURCE_CHILD)){

                        // Almacenamos en nuestro array $data el id del resource que nos mandan desde la url.
                        $data['id'.RESOURCE] = (int)ID_RESOURCE;
                        $data['iddepartment'] = (int)ID_RESOURCE_CHILD;

                        // Instanciamos el Formulario "resourceForm"
                        $resourceForm = ResourceManager::getResourceForm($resourceName);

                        // Obtenemos los elementos del Formulario "resourceForm"
                        $elementsForm = $resourceForm->getElements();

                        // Recorremos los elementos de nuestro formulario y le insertamos los valores a $dataArray
                        if($data != null){
                            $dataArray = array();
                            foreach($elementsForm as $key=>$value){
                                $dataArray[$key] = isset($data[$key]) ? $data[$key] : null;
                            }
                        }

                        // Instanciamos nuestro formulario resourceFormPostPut
                        $resourceFormPostPut = ResourceManager::getResourceFormPostPut($resourceName);
                        $FormPostPut = $resourceFormPostPut::init($userLevel);
                        //Le ponemos los datos a nuestro formulario
                        $FormPostPut->setData($dataArray);

                        // Instanciamos nuestro filtro resourceFilterPostPut
                        $resourceFilterPostPut = ResourceManager::getResourceFilterPostPut($resourceName);

                        //Le ponemos el filtro a nuestro formulario
                        $FilterPostPut = $resourceFilterPostPut;
                        $FormPostPut->setInputFilter($FilterPostPut->getInputFilter($userLevel));
                        //Si los valores son validos
                        if($FormPostPut->isValid()){

                            // Instanciamos nuestro recurso
                            $resource = ResourceManager::getResource($resourceName);
                            $resourceArray = $resource->toArray(BasePeer::TYPE_FIELDNAME);

                            // Recorremos los elementos de nuestro formularioPost y le insertamos los valores a $responseArray para preparar nuestra respuesta
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
                            $issave = $resource->saveResouce($responseArray,$idCompany,$userLevel, null);

                            //Modifiamos el Header de nuestra respuesta
                            $response->setStatusCode($issave['statusCode']); //BAD REQUEST

                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    // Create the config object
                                    $writer = new \Zend\Config\Writer\Xml();
                                    return $response->setContent($writer->toString($issave['bodyResponse']));
                                    break;
                                }
                                case "json":{
                                    return new JsonModel($issave['bodyResponse']);
                                    break;
                                }
                                default: {
                                return new JsonModel($issave['bodyResponse']);
                                break;
                                }
                            }
                            //Si el formulario no fue valido
                        }else{
                            //Modifiamos el Header de nuestra respuesta
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
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                            switch(TYPE_RESPONSE){
                                case "xml":{;
                                    $writer = new \Zend\Config\Writer\Xml();
                                    return $response->setContent($writer->toString(ArrayResponse::getResponseBody(400, $messageArray)));
                                    break;
                                }
                                case "json":{
                                    return new JsonModel(ArrayResponse::getResponseBody(400, $messageArray));
                                    break;
                                }
                                default: {
                                return new JsonModel(ArrayResponse::getResponseBody(400, $messageArray));
                                break;
                                }
                            }
                        }
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 400 . ' Bad Request',
                                'Title' => 'The request data is invalid',
                                'Details' => 'Invalid id '.RESOURCE_CHILD,
                            ),
                        );
                        switch(TYPE_RESPONSE){
                            case "xml":{;
                                $writer = new \Zend\Config\Writer\Xml();
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            return new JsonModel($bodyResponse);
                            break;
                            }
                        }
                    }
                }
                ////// End Resource Relational //////

                // Almacenamos en nuestro array $data el id del resource que nos mandan desde la url.
                $data['id'.RESOURCE] = (int)ID_RESOURCE;

                // Instanciamos el Formulario "resourceForm"
                $resourceForm = ResourceManager::getResourceForm($resourceName);

                // Obtenemos los elementos del Formulario "resourceForm"
                $elementsForm = $resourceForm->getElements();

                // Recorremos los elementos de nuestro formulario y le insertamos los valores a $dataArray
                if($data != null){
                    $dataArray = array();
                    foreach($elementsForm as $key=>$value){
                        $dataArray[$key] = isset($data[$key]) ? $data[$key] : null;
                    }
                }

                // Instanciamos nuestro formulario resourceFormPostPut
                $resourceFormPostPut = ResourceManager::getResourceFormPostPut($resourceName);
                $FormPostPut = $resourceFormPostPut::init($userLevel);
                //Le ponemos los datos a nuestro formulario
                $FormPostPut->setData($dataArray);

                // Instanciamos nuestro filtro resourceFilterPostPut
                $resourceFilterPostPut = ResourceManager::getResourceFilterPostPut($resourceName);

                //Le ponemos el filtro a nuestro formulario
                $FilterPostPut = $resourceFilterPostPut;
                $FormPostPut->setInputFilter($FilterPostPut->getInputFilter($userLevel));
                //Si los valores son validos
                if($FormPostPut->isValid()){

                    // Instanciamos nuestro recurso
                    $resource = ResourceManager::getResource($resourceName);
                    $resourceArray = $resource->toArray(BasePeer::TYPE_FIELDNAME);

                    // Recorremos los elementos de nuestro formularioPost y le insertamos los valores a $responseArray para preparar nuestra respuesta
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
                    $issave = $resource->saveResouce($responseArray,$idCompany,$userLevel, null);

                    //Modifiamos el Header de nuestra respuesta
                    $response->setStatusCode($issave['statusCode']); //BAD REQUEST

                    switch(TYPE_RESPONSE){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($issave['bodyResponse']));
                            break;
                        }
                        case "json":{
                            return new JsonModel($issave['bodyResponse']);
                            break;
                        }
                        default: {
                        return new JsonModel($issave['bodyResponse']);
                        break;
                        }
                    }
                    //Si el formulario no fue valido
                }else{
                    //Modifiamos el Header de nuestra respuesta
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
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    switch(TYPE_RESPONSE){
                        case "xml":{;
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString(ArrayResponse::getResponseBody(400, $messageArray)));
                            break;
                        }
                        case "json":{
                            return new JsonModel(ArrayResponse::getResponseBody(400, $messageArray));
                            break;
                        }
                        default: {
                        return new JsonModel(ArrayResponse::getResponseBody(400, $messageArray));
                        break;
                        }
                    }
                }
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id '.RESOURCE,
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{;
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }
    /////////// End create ResourceChild or Resource Relational  ///////////

    /////////// Start get ResourceChild or ResourceRealational  ///////////
    /**
     * @return mixed|JsonModel
     */
    public function getResourceChildAction(){

        $id = ID_RESOURCE;
        $idChild = ID_RESOURCE_CHILD;

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        if(RESOURCE_CHILD!=null){
            $resourceName = NAME_RESOURCE_CHILD;
            $module = MODULE_RESOURCE_CHILD;
        }else{
            // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
            $module = MODULE_RESOURCE;
        }
        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            //Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);
            $isIdValid = $resource->isIdValidResource($id, $idCompany);
            if($isIdValid){
                if(RESOURCE_CHILD !=null && $idChild !=null){
                    //Obtenemos nuestra entidad child
                    $isIdChildValid = $resource->isIdValidResurceChild($id, $idChild);
                    if($isIdChildValid){
                        $entity = $resource->getEntity($idChild);
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 400 . ' Bad Request',
                                'Title' => 'The request data is invalid',
                                'Details' => 'Invalid '.RESOURCE_CHILD.' id',
                            ),
                        );
                        switch(TYPE_RESPONSE){
                            case "xml":{;
                                $writer = new \Zend\Config\Writer\Xml();
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            return new JsonModel($bodyResponse);
                            break;
                            }
                        }
                    }
                }else{
                    //Obtenemos nuestra entidad padre
                    $entity = $resource->getEntity($id);
                }
                //Llamamos a la funcion entityResponse para darle formato a nuestra respuesta
                $bodyResponse = $resource->getEntityResponse($entity,$userLevel);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $response = $this->getResponse();
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid '.RESOURCE.' id',
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }
    /////////// End get ResourceChild or ResourceRealational  ///////////

    /////////// Start getList ResourceChild or ResourceRealational  ///////////
    /**
     * @return mixed|JsonModel
     */
    public function getListResourceChildAction(){
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto Response, el cual utilizamos en las respuestas
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        if(RESOURCE_CHILD!=null){
            $resourceName = NAME_RESOURCE_CHILD;
            $module = MODULE_RESOURCE_CHILD;
        }else{
            // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
            $module = MODULE_RESOURCE;
        }

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro Recurso
            $resource = ResourceManager::getResource($resourceName);

            if(RESOURCE_CHILD !=null){

                if(!$resource->isIdValidResource(ID_RESOURCE,$idCompany)){

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid '.RESOURCE.' id',
                        ),
                    );
                    switch(TYPE_RESPONSE){
                        case "xml":{;
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }
            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormGET = ResourceManager::getResourceFormGET($resourceName);
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
            if(RESOURCE_CHILD!=null){
                $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'id'.LOWER_NAME_RESOURCE_CHILD;
                if(class_exists(ucfirst(RESOURCE_CHILD))){
                    $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'id'.LOWER_NAME_RESOURCE_CHILD;
                }
            }
            $page = (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters != null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $getCollection = $resource->getCollection($idCompany, $page, $limit, $filters, $order, $dir);


            if(!empty($getCollection['data'])){
                // Si el recurso que solicitan es Company
                if(RESOURCE == 'company'){
                    // Solamente el idcompany == 1 podrá listar todas la Compañias existentes
                    if($idCompany == 1){
                        return new JsonModel($getCollection);
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 403 . ' Forbidden',
                                'Title' => 'Access denied',
                                'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                            ),
                        );
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                // Create the config object
                                $response = $this->getResponse();
                                $writer = new \Zend\Config\Writer\Xml();
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            return new JsonModel($bodyResponse);
                            break;
                            }
                        }
                    }
                }else{

                    $bodyResponse = $resource->getCollectionResponse($getCollection, $userLevel);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            // Create the config object
                            $response = $this->getResponse();
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                    return new JsonModel($Response);
                }
            }else{

                //Modifiamos el Header de nuestra respuesta
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //No Content
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'No Content',
                        'Details' => 'The server successfully processed the request, but is not returning any content.',
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{
                        // Create the config object
                        $response = $this->getResponse();
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP_Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            switch(TYPE_RESPONSE){
                case "xml":{
                    // Create the config object
                    $response = $this->getResponse();
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }
    /////////// End getList ResourceChild or ResourceRealational  ///////////

    /////////// Start update ResourceChild or ResourceRelational ///////////
    /**
     * @return mixed|JsonModel
     */
    public function updateResourceChildAction($data) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto request
        $request = $this->getRequest();

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        if(RESOURCE_CHILD!=null){
            $resourceName = NAME_RESOURCE_CHILD;
            $module = MODULE_RESOURCE_CHILD;
        }else{
            // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
            $module = MODULE_RESOURCE;
        }

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Obtenemos el nombre de nuestro recurso
            $resourcename = RESOURCE;
            // Obtenemos el nombre de nuestro recursoChild
            $resourcenameChild = RESOURCE_CHILD;

            $resource = ResourceManager::getResource($resourceName);

            if($resource->isIdValidResource(ID_RESOURCE,$idCompany)){
                if($resource->isIdValidResurceChild(ID_RESOURCE,ID_RESOURCE_CHILD)){

                    // Creamos un array para almacenar los ids que nos mandan desde la URL
                    $data['id'.RESOURCE] = ID_RESOURCE;
                    $data['id'.strtolower(NAME_RESOURCE_CHILD)] = ID_RESOURCE_CHILD;

                    $functionUpdate = $resource->updateResource($data, $idCompany, $userLevel, $request, $response);

                    switch(TYPE_RESPONSE){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($functionUpdate));
                            break;
                        }
                        case "json":{
                            return new JsonModel($functionUpdate);
                            break;
                        }
                        default: {
                        return new JsonModel($functionUpdate);
                        break;
                        }
                    }
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid id'.RESOURCE_CHILD,
                        ),
                    );
                    switch(TYPE_RESPONSE){
                        case "xml":{;
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id'.RESOURCE,
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{;
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }
    }
    /////////// End update ResourceChild or ResourceRelational  ///////////

    /////////// Start delete ResourceChild or ResourceRealational  ///////////
    /**
     * @return mixed|JsonModel
     */
    public function deleteResourceChildAction($id) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto request
        $request = $this->getRequest();

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        if(RESOURCE_CHILD!=null){
            $resourceName = NAME_RESOURCE_CHILD;
            $module = MODULE_RESOURCE_CHILD;
        }else{
            // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
            $module = MODULE_RESOURCE;
        }

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Obtenemos el nombre de nuestro recurso
            $resourcename = RESOURCE;
            // Obtenemos el nombre de nuestro recursoChild
            $resourcenameChild = RESOURCE_CHILD;
            // Obtenemos el nombra del recurso concatenado con el recursoChild
            $resourcenameRelational = RESOURCE.RESOURCE_CHILD;
            // Hacemos la primer letra mayúscula
            $resourceNameRelational = ucfirst($resourcenameRelational);

            // Obtenemos el nombre de los ids
            $idResourceName = 'id'.$resourcename;
            $idResourceChildName = 'id'.$resourcenameChild;
            $idResourceRelationalName = 'id'.$resourcenameRelational;
            // Creamos un array para almacenar los ids que nos mandan desde la URL
            $data = array();
            $data[$idResourceName] = ID_RESOURCE;
            $data[$idResourceChildName] = ID_RESOURCE_CHILD;

            //Instanciamos nuestra ResourceChildQuery
            $resourceQueryRelational = ResourceManager::getResourceQuery($resourceNameRelational);

            $filterByIdResource = "filterById".RESOURCE;
            $filterByIdResourceChild = "filterById".LOWER_NAME_RESOURCE_CHILD;

            $resourceRelationalData = $resourceQueryRelational->$filterByIdResource($data[$idResourceName])->$filterByIdResourceChild($data[$idResourceChildName])->find();
            $resourceRelationalArray = $resourceRelationalData->getArrayCopy($idResourceRelationalName);

            // Obtenemos el idresourcechild que se desea modificar
            $idresourceRelational = (key($resourceRelationalArray));

            if(!isset($idresourceRelational)){
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id'.LOWER_NAME_RESOURCE_CHILD,
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
            //Instanciamos nuestra ResourceChild
            $resourceRelational = ResourceManager::getResource($resourceNameRelational);

            //Verificamos si el id que se quiere eliminar pertenece a la compañia
            if($resourceRelational->isIdValidResource(ID_RESOURCE,$idCompany)){
                if($resourceRelational->deleteEntity($idresourceRelational,$userLevel)){
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_204); //NOT CONTENT
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid id',
                        ),
                    );
                    switch(TYPE_RESPONSE){
                        case "xml":{;
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id '.RESOURCE_CHILD,
                    ),
                );
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $writer = new \Zend\Config\Writer\Xml();
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }

        }else{
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //BAD REQUEST
            $bodyResponse = ArrayResponse::getResponseBody(403);
            switch(TYPE_RESPONSE){
                case "xml":{;
                    $writer = new \Zend\Config\Writer\Xml();
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }

    }
    /////////// End delete ResourceChild or ResourceRealational  ///////////
}