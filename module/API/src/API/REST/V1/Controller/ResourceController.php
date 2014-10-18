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
use API\REST\V1\Shared\Functions\HttpResponseManager;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ArrayResponse;
// - Propel - //
use StaffQuery;
use CompanyQuery;
use BasePeer;
use ResourceAlternative;

/**
 * Class APIController
 * @package API\REST\V1\Controller
 */
class ResourceController extends AbstractRestfulController
{
    /**
     * @var array
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
    }

    /**
     * @param mixed $data
     * @return mixed|JsonModel
     */
    public function create($data) {

        // Si resourceChild el diferente de null
        if(RESOURCE_CHILD != null){

            // Retornamos la función createResourceChildAction mandandole como parámetro el $data
            return $this->createResourceChildAction($data);

        }

        // Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        // Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        // Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto request
        $request = $this->getRequest();

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, Company, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = MODULE_RESOURCE;

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        // Verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro formulario resourceFormPostPut
            $resourceFormPostPut = ResourceManager::getResourceFormPostPut($resourceName);
            // Obtenemos el formulario de nuestro recurso dependiendo del nivel de usuario
            $FormPostPut = $resourceFormPostPut::init($userLevel);

            // Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $dataArray = HttpRequest::resourceCreateData($data, $request, $response, $resourceName);

            // Si $dataArray nos retorna un error
            if(isset($dataArray['error'])){
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($dataArray));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($dataArray);
                        break;
                    }
                    default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($dataArray);
                        break;
                    }
                }
            }

            // Obtenemos un array de los datos de nuestro recurso
            $resourceArray = $resource->toArray(BasePeer::TYPE_FIELDNAME);

            // Si $data existe
            if(isset($data)){
                // Desmembramos las columnas y valores del recurso.
                foreach ($resourceArray as $key => $value){
                    // Si el valor de nuestro recurso es diferente de null y en la petición(body) no solicitan alguna columna existente del recurso
                    if(!is_null($value) && is_null($dataArray[$key])){
                        // Agregamos a nuestro $dataArray los valores que tiene por defecto nuestro recurso
                        $dataArray[$key] = $value;
                    }
                }
            }

            // Le ponemos los datos a nuestro formulario
            $FormPostPut->setData($dataArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $resourceFilterPostPut = ResourceManager::getResourceFilterPostPut($resourceName);

            // Le ponemos el filtro a nuestro formulario
            $FormPostPut->setInputFilter($resourceFilterPostPut->getInputFilter($userLevel));

            // Si los valores son validos
            if($FormPostPut->isValid()){

                // Inicializamos una variable de tipo array
                $responseArray = array();
                // Obtenemos los elementos de nuestro formulario (columnas y valores)
                foreach ($FormPostPut->getElements() as $keyElement => $valueElement){
                    // Preparamos nuestro responseArray con las columnas de nuestro formulario y los valores de nuestro recurso (si existen columnas con valores por defecto, aqui los agregamos).
                    $responseArray[$keyElement] = $resourceArray[$keyElement];
                }
                // Desmembramos nuestro $dataArray (columnas y valores)
                foreach ($dataArray as $dataKey => $dataValue){
                    // Si el valor de la columna es diferente de null
                    if(!is_null($dataValue)){
                        // Agregamos a nuestro $responseArray los valores que nos envian en la petición(body).
                        $responseArray[$dataKey] = $dataArray[$dataKey];
                    }
                }

                // Ingresamos al objeto del recurso directamente en la clase de Propel
                // $data solo es alternativo, lo utiliza algunos objetos solamente, como department.
                $issave = $resource->saveResouce($responseArray,$idCompany,$userLevel, $data);

                if($issave['status_code'] == 201){
                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                    switch(TYPE_RESPONSE){
                        case "xml":{;
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse['details']));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse['details']);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse['details']);
                        break;
                        }
                    }
                }else{
                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                    switch(TYPE_RESPONSE){
                        case "xml":{;
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
                //Si el formulario no fue valido
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($FormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }

                $bodyResponse = ArrayResponse::getResponse(409, $response, $messageArray);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                }

            }
            //Si el usuario no tiene permisos sobre el recurso
        }else{
            echo "Entro";
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
            }
        }
    }

    public function get($id){

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = MODULE_RESOURCE;

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            //Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);

            // Ingresamos al objeto del recurso directamente en la clase de Propel
            // isIdValidRespurce retorna un valor boleano
            $isIdValid = $resource->isIdValidResource($id,$idCompany);

            // Si $isIdValid es true
            if($isIdValid){

                //Obtenemos nuestra entidad
                $entity = $resource->getEntity($id);

                //Llamamos a la funcion entityResponse para darle formato a nuestra respuesta
                $bodyResponse = $resource->getEntityResponse($entity,$userLevel);
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid '.RESOURCE.' id');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro Recurso
            $resource = ResourceManager::getResource($resourceName);

            // Instanciamos nuestro formulario resourceFormGET
            $resourceFormGET = ResourceManager::getResourceFormGET($resourceName);
            // Obtenemos el formulario de nuestro recurso dependiendo del nivel de usuario
            $resourceFormGET = $resourceFormGET::init($userLevel);


            // Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
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

            // Ingresamos al objeto del recurso directamente en la clase de Propel
            // getCollection retorna un array
            $getCollection = $resource->getCollection($idCompany, $page, $limit, $filters, $order, $dir);

            if(!empty($getCollection['data'])){
                $bodyResponse = $resource->getCollectionResponse($getCollection, $userLevel);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(204, $response);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Si resourceChild el diferente de null
        if(RESOURCE_CHILD != null){

            // Retornamos la función updateResourceChildAction mandandole como parámetro el $data
            return $this->updateResourceChildAction($data);

        }

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto response
        $request = $this->getRequest();

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = MODULE_RESOURCE;

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        // Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        // Verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);

            // Ingresamos al objeto del recurso directamente en la clase de Propel
            // updateResource retorna un array
            $isUpdate = $resource->updateResource($id, $data, $idCompany, $userLevel, $request, $response);

            if($isUpdate['status_code'] == 200){
                $bodyResponse = ArrayResponse::getResponse($isUpdate['status_code'], $response, $isUpdate['details']);
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse['details']));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse['details']);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse['details']);
                    break;
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse($isUpdate['status_code'], $response, $isUpdate['details']);
                switch(TYPE_RESPONSE){
                    case "xml":{;
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }

            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Si resourceChild el diferente de null
        if(RESOURCE_CHILD != null){

            // Retornamos la función deleteResourceChildAction mandandole como parámetro el $id
            return $this->deleteResourceChildAction($id);

        }
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto response
        $response = $this->getResponse();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ucfirst($this->getEvent()->getRouteMatch()->getMatchedRouteName());


        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        // Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        // Verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);

            // Verificamos si el id que se quiere eliminar pertenece a la compañia
            if($resource->isIdValidResource($id,$idCompany)){
                // Ingresamos al objeto del recurso directamente en la clase de Propel
                // deleteEntity retorna un valor boleano
                if($resource->deleteEntity($id,$userLevel)){
                    // Modifiamos el Header de nuestra respuesta
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_204);
                }else{
                    $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id.', 'The request data is invalid');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id' . RESOURCE, 'The request data is invalid');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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
            // Almacenamos el nombre del resourceChild (Ejemplo: Clientaddress, Clientfile, Departmentleader, etc...)
            $resourceName = NAME_RESOURCE_CHILD;
            $module = MODULE_RESOURCE_CHILD;
        }else{
            // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
            $module = MODULE_RESOURCE;
        }

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            // Obtenemos el nombre de nuestro recursoChild
            $resourcenameChild = RESOURCE_CHILD;

            $resource = ResourceManager::getResource($resourceName);

            // No agregamos el validador del "body is empty" porque los datos que nos importan están en la URL

            // Si el id existe y pertenece a la compañia
            if($resource->isIdValidResource(ID_RESOURCE,$idCompany)){
                switch(RESOURCE_CHILD){
                    ////// Start Resource Relational //////
                    case 'department':{

                        // Si el idChild existe y pertenece a la misma compañia
                        if($resource->isIdValidResurceChild(ID_RESOURCE_CHILD, $idCompany)){

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
                            $FormPostPut->setInputFilter($resourceFilterPostPut->getInputFilter($userLevel));
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

                                if($issave['status_code'] == 201){
                                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{;
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse['details']));
                                            break;
                                        }
                                        case "json":{
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                            return new JsonModel($bodyResponse['details']);
                                            break;
                                        }
                                        default: {
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse['details']);
                                        break;
                                        }
                                    }
                                }else{
                                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{;
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse));
                                            break;
                                        }
                                        case "json":{
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                            return new JsonModel($bodyResponse);
                                            break;
                                        }
                                        default: {
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse);
                                        break;
                                        }
                                    }
                                }

                                //Si el formulario no fue valido
                            }else{
                                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                                $messageArray = array();
                                foreach ($FormPostPut->getMessages() as $key => $value){
                                    foreach($value as $val){
                                        //Obtenemos el valor de la columna con error
                                        $message = $key.' '.$val;
                                        array_push($messageArray, $message);
                                    }
                                }
                                $bodyResponse = ArrayResponse::getResponse(409, $response, $messageArray);
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        break;
                                    }
                                    case "json":{
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse);
                                        break;
                                    }
                                    default: {
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                    }
                                }
                            }
                        }else{
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id '.RESOURCE_CHILD);
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    break;
                                }
                                case "json":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                }
                                default: {
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                                }
                            }
                        }
                        break;
                    }
                    case 'client':{

                        // Si el id existe y el idChild existe y pertenece a la misma compañia
                        if($resource->isIdValidResurceChild(ID_RESOURCE_CHILD, $idCompany)){

                            // Almacenamos en nuestro array $data el id del resource que nos mandan desde la url.
                            $data['idclient'] = (int)ID_RESOURCE_CHILD;
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
                            $FormPostPut->setInputFilter($resourceFilterPostPut->getInputFilter($userLevel));
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

                                if($issave['status_code'] == 201){
                                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{;
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse['details']));
                                            break;
                                        }
                                        case "json":{
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                            return new JsonModel($bodyResponse['details']);
                                            break;
                                        }
                                        default: {
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse['details']);
                                        break;
                                        }
                                    }
                                }else{
                                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{;
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse));
                                            break;
                                        }
                                        case "json":{
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                            return new JsonModel($bodyResponse);
                                            break;
                                        }
                                        default: {
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse);
                                        break;
                                        }
                                    }
                                }

                                //Si el formulario no fue valido
                            }else{
                                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                                $messageArray = array();
                                foreach ($FormPostPut->getMessages() as $key => $value){
                                    foreach($value as $val){
                                        //Obtenemos el valor de la columna con error
                                        $message = $key.' '.$val;
                                        array_push($messageArray, $message);
                                    }
                                }
                                $bodyResponse = ArrayResponse::getResponse(409, $response, $messageArray);
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        break;
                                    }
                                    case "json":{
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse);
                                        break;
                                    }
                                    default: {
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                    }
                                }
                            }
                        }else{
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id '.RESOURCE_CHILD);
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    break;
                                }
                                case "json":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                }
                                default: {
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                                }
                            }
                        }
                        break;
                    }
                    case 'user':{

                        // Si el id existe y el idChild existe y pertenece a la misma compañia
                        if($resource->isIdValidResurceChild(ID_RESOURCE_CHILD, $idCompany)){

                            // Almacenamos en nuestro array $data el id del resource que nos mandan desde la url.
                            $data['id'.RESOURCE] = (int)ID_RESOURCE;
                            $data['iduser'] = (int)ID_RESOURCE_CHILD;

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
                            $FormPostPut->setInputFilter($resourceFilterPostPut->getInputFilter($userLevel));
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

                                if($issave['status_code'] == 201){
                                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{;
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse['details']));
                                            break;
                                        }
                                        case "json":{
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                            return new JsonModel($bodyResponse['details']);
                                            break;
                                        }
                                        default: {
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse['details']);
                                        break;
                                        }
                                    }
                                }else{
                                    $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{;
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse));
                                            break;
                                        }
                                        case "json":{
                                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                            return new JsonModel($bodyResponse);
                                            break;
                                        }
                                        default: {
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse);
                                        break;
                                        }
                                    }
                                }

                                //Si el formulario no fue valido
                            }else{
                                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                                $messageArray = array();
                                foreach ($FormPostPut->getMessages() as $key => $value){
                                    foreach($value as $val){
                                        //Obtenemos el valor de la columna con error
                                        $message = $key.' '.$val;
                                        array_push($messageArray, $message);
                                    }
                                }
                                $bodyResponse = ArrayResponse::getResponse(409, $response, $messageArray);
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        break;
                                    }
                                    case "json":{
                                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                        return new JsonModel($bodyResponse);
                                        break;
                                    }
                                    default: {
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                    }
                                }
                            }
                        }else{
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id '.RESOURCE_CHILD);
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    break;
                                }
                                case "json":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                }
                                default: {
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                                }
                            }
                        }
                        break;
                    }
                    ////// End Resource Relational //////

                    ////// Start Resource Child Relational //////
                    case "leader" :{
                        // Si el usuario es encargado de departamento o dueño de la empresa.
                        if($userLevel >= 4){
                            $idstaff = isset($data['idstaff'])?$data['idstaff']:null;
                            if(isset($idstaff)){
                                $staffQuery = new StaffQuery();
                                $staffQueryEntity = $staffQuery->create()->filterByIdstaff($idstaff)->findOne();
                                $iduser = $staffQueryEntity->getIduser();
                                $data['iduser'] = $iduser;
                            }
                        }else{
                            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    break;
                                }
                                case "json":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                }
                                default: {
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                                }
                            }
                        }
                        break;
                    }
                    case "member" :{
                        // Si el usuario es supervisor o superior (departmentleader, encargado de departamento o dueño de la empresa)
                        if($userLevel >= 3){
                            $idstaff = (int) $this->params()->fromRoute('idChild',false);
                            if(isset($idstaff)){
                                $staffQuery = new StaffQuery();
                                $staffQueryEntity = $staffQuery->create()->filterByIdstaff($idstaff)->findOne();
                                $iduser = $staffQueryEntity->getIduser();
                                $data['iduser'] = $iduser;
                            }
                        }else{
                            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    break;
                                }
                                case "json":{
                                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                    return new JsonModel($bodyResponse);
                                    break;
                                }
                                default: {
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                                }
                            }
                        }
                        break;
                    }
                    ////// End Resource Child Relational //////
                }

                // Almacenamos en nuestro array $data el id del resource que nos mandan desde la url.
                $data['id'.RESOURCE] = (int)ID_RESOURCE;

                // Instanciamos el Formulario "resourceForm"
                $resourceForm = ResourceManager::getResourceForm($resourceName);

                // Obtenemos los elementos del Formulario "resourceForm"
                $elementsForm = $resourceForm->getElements();

                // Recorremos los elementos de nuestro formulario y le insertamos los valores a $dataArray
                if($data != null){
                    // Seteamos $dataArray
                    $dataArray = array();
                    // Almacenamos en $dataArray las columnas del formulario y le asignamos el valor que nos mandan por post, si estan vacios, le asignamos valor null.
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
                $FormPostPut->setInputFilter($resourceFilterPostPut->getInputFilter($userLevel));

                //Si los valores son validos
                if($FormPostPut->isValid()){

                    // Instanciamos nuestro recurso
                    $resource = ResourceManager::getResource($resourceName);
                    $resourceArray = $resource->toArray(BasePeer::TYPE_FIELDNAME);

                    // Recorremos los elementos de nuestro formularioPost y le insertamos los valores a $responseArray para preparar nuestra respuesta
                    $responseArray = array();
                    foreach ($FormPostPut->getElements() as $keyElement => $valueElement){
                        $responseArray[$keyElement] = isset($resourceArray[$keyElement])?$resourceArray[$keyElement]:null;
                    }
                    foreach ($dataArray as $dataKey => $dataValue){
                        if(!is_null($dataValue)){
                            $responseArray[$dataKey] = $dataArray[$dataKey];
                        }
                    }

                    // Ingresamos al objeto del recurso directamente en la clase de Propel
                    $issave = $resource->saveResouce($responseArray,$idCompany,$userLevel);

                    if($issave['status_code'] == 201){
                        $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                        switch(TYPE_RESPONSE){
                            case "xml":{;
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse['details']));
                                break;
                            }
                            case "json":{
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse['details']);
                                break;
                            }
                            default: {
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse['details']);
                            break;
                            }
                        }
                    }else{
                        $bodyResponse = ArrayResponse::getResponse($issave['status_code'], $response, $issave['details']);
                        switch(TYPE_RESPONSE){
                            case "xml":{;
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                            }
                        }
                    }
                    //Si el formulario no fue valido
                }else{

                    //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                    $messageArray = array();
                    foreach ($FormPostPut->getMessages() as $key => $value){
                        foreach($value as $val){
                            //Obtenemos el valor de la columna con error
                            $message = $key.' '.$val;
                            array_push($messageArray, $message);
                        }
                    }

                    $bodyResponse = ArrayResponse::getResponse(409, $response, $messageArray);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id '.RESOURCE);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Instanciamos el objeto Response, el cual utilizamos en las respuestas
        $response = $this->getResponse();

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = ResourceManager::getUserLevels($idUser, $module);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            //Instanciamos nuestro recurso
            $resource = ResourceManager::getResource($resourceName);
            $isIdValid = $resource->isIdValidResource($id, $idCompany);
            if($isIdValid){
                if(RESOURCE_CHILD !=null && $idChild !=null){
                    // Si el idChild existe y pertenece a la misma compañia
                    $isIdChildValid = $resource->isIdValidResurceChild(ID_RESOURCE_CHILD, $idCompany);
                    if($isIdChildValid){
                        $entity = $resource->getEntity($idChild);
                    }else{
                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid '.RESOURCE_CHILD.' id', 'The request data is invalid');
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }

            }else{
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid '.RESOURCE.' id', 'The request data is invalid');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

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
                $bodyResponse = $resource->getCollectionResponse($getCollection, $userLevel);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(204, $response);
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

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
                // Si el idChild existe y pertenece a la misma compañia
                if($resource->isIdValidResurceChild(ID_RESOURCE_CHILD, $idCompany)){

                    // Creamos un array para almacenar los ids que nos mandan desde la URL
                    $data['id'.RESOURCE] = ID_RESOURCE;
                    $data['id'.strtolower(NAME_RESOURCE_CHILD)] = ID_RESOURCE_CHILD;

                    $isUpdate = $resource->updateResource($data, $idCompany, $userLevel, $request, $response);
                    if($isUpdate['status_code'] == 200){
                        $bodyResponse = ArrayResponse::getResponse($isUpdate['status_code'], $response, $isUpdate['details']);
                        switch(TYPE_RESPONSE){
                            case "xml":{;
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse['details']));
                                break;
                            }
                            case "json":{
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse['details']);
                                break;
                            }
                            default: {
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse['details']);
                            break;
                            }
                        }
                    }else{
                        $bodyResponse = ArrayResponse::getResponse($isUpdate['status_code'], $response, $isUpdate['details']);
                        switch(TYPE_RESPONSE){
                            case "xml":{;
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                break;
                            }
                            case "json":{
                                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                                return new JsonModel($bodyResponse);
                                break;
                            }
                            default: {
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                            }
                        }
                    }
                }else{
                    $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id'.RESOURCE_CHILD, 'The request data is invalid');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id'.RESOURCE, 'The request data is invalid');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
            //Si el usuario no tiene permisos sobre el recurso
        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

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
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id'.LOWER_NAME_RESOURCE_CHILD, 'The request data is invalid');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
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
                    $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id', 'The request data is invalid');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id '.RESOURCE_CHILD, 'The request data is invalid');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }

        }else{
            $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
            switch(TYPE_RESPONSE){
                case "xml":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                    return $response->setContent($writer->toString($bodyResponse));
                    break;
                }
                case "json":{
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                }
                default: {
                $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                return new JsonModel($bodyResponse);
                break;
                }
            }
        }

    }
    /////////// End delete ResourceChild or ResourceRealational  ///////////

    /////////// Start getList ResourceAlternative  ///////////
    /**
     * @return mixed|JsonModel
     */
    public function getListResourceAlternativeAction(){

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = ResourceManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = ResourceManager::getIDCompany($token);

        // Instanciamos el objeto Response, el cual utilizamos en las respuestas
        $response = $this->getResponse();

        // Instanciamos el objeto para la respuesta XML
        $writer = new \Zend\Config\Writer\Xml();

        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
        $resourceName = ucfirst(RESOURCE);
        // almacenamos el resourceNameChild e una variable (En este paso ya tenemos Staff, etc...)
        $resourceNameChild = NAME_RESOURCE_CHILD;

        // Si el recurso y el recursoChild pertenecen al mismo modulo
        if(MODULE_RESOURCE == MODULE_RESOURCE_CHILD){
            $module = MODULE_RESOURCE;
            //Obtenemnos el nivel de acceso del usuario para el recurso
            $userLevel = ResourceManager::getUserLevels($idUser, $module);

            //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
            if($userLevel!=0){

                // Instanciamos nuestro Recurso
                $resource = ResourceManager::getResource($resourceName);
                // Validamos que exista el idResource y que pertenezca a la compañia
                if(!$resource->isIdValidResource(ID_RESOURCE,$idCompany)){
                    $bodyResponse = ArrayResponse::getResponse(409, $response, 'Invalid id'.RESOURCE, 'The request data is invalid');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }

                // Instanciamos nuestro formulario resourceAlternativeFormPostPut
                $resourceChildFormGET = ResourceManager::getResourceFormGET($resourceNameChild);
                $resourceChildFormGET = $resourceChildFormGET::init($userLevel);

                //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
                $allowedColumns = array();
                foreach ($resourceChildFormGET->getElements() as $key=>$value){
                    array_push($allowedColumns, $key);
                }

                //Verificamos que si nos envian filtros por GET si no ponemos valores por default
                $limit = (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
                if($limit > 100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
                $dir = $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
                $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'id'.LOWER_NAME_RESOURCE_CHILD;
                $page = (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
                $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
                if($filters != null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

                // Instanciamos nuestro Recurso Alternativo (Ejemplo: StaffQuery, etc...)
                $resourceAlternativeQuery = ResourceManager::getResourceQuery($resourceNameChild);
                // Instanciamos la classe ResourceAlternative para ingresar a sus funciones
                $ResourceAlternative = new ResourceAlternative();
                // Obtenemos la colección del recurso alternatvo
                $getCollectionAlternative = $ResourceAlternative->getCollectionAlternative($resourceAlternativeQuery, $idCompany, $page, $limit, $filters, $order, $dir);

                // Si sí existen registros en la base de datos
                if(!empty($getCollectionAlternative['data'])){

                    $bodyResponse = $ResourceAlternative->getCollectionResponse($getCollectionAlternative, $userLevel);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }

                }else{
                    $bodyResponse = ArrayResponse::getResponse(204, $response);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            break;
                        }
                        case "json":{
                            $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                            return new JsonModel($bodyResponse);
                            break;
                        }
                        default: {
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                        }
                    }
                }
            }else{
                $bodyResponse = ArrayResponse::getResponse(403, $response, 'Sorry but you does not have permission over this resource. Please contact with your supervisor.', 'Access denied');
                switch(TYPE_RESPONSE){
                    case "xml":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                        return $response->setContent($writer->toString($bodyResponse));
                        break;
                    }
                    case "json":{
                        $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                        return new JsonModel($bodyResponse);
                        break;
                    }
                    default: {
                    $response->getHeaders()->addHeaders(array('Content-type' => 'application/json'));
                    return new JsonModel($bodyResponse);
                    break;
                    }
                }
            }
        }
    }
    /////////// End getList ResourceAlternative  ///////////
}