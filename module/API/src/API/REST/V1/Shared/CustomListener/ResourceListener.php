<?php

/**
 * HeadersListener.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\CustomListener;

// - ZF2 - //
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\Model\JsonModel;
use Zend\Http\Response;

// - Shared - //
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ResourceManager;

/**
 * Class HeadersListener
 * @package API\REST\V1\Shared\CustomListener
 */
class ResourceListener implements ListenerAggregateInterface {

    /*Primero registramos el listener y asignamos una proridad alta (1000 es la mas alta)
     * para que se ejecute lo antes posible dentro del stack de
     * listeners registrados en el evento.
     */

    protected $listeners = array();

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events){

        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 900);

    }

    /**
     * @param EventManagerInterface $events
     */
    //El método detach() lo unico que hace es remover el listener del evento
    public function detach(EventManagerInterface $events){

        foreach ($this->listeners as $index => $listener){

            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    //Se toma desiciones personales para la aplicación
    public function onDispatch(MvcEvent $e){

        $response = $e->getResponse();
        $request  = $e->getRequest();
        $typeResponse = $e->getRouteMatch()->getParam('typeResponse');
        define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
        define('RESOURCE_CHILD', $e->getRouteMatch()->getParam('resourceChild'));
        define('ID_RESOURCE', $e->getRouteMatch()->getParam('id'));
        define('ID_RESOURCE_CHILD', $e->getRouteMatch()->getParam('idChild'));

        $method = $request->getMethod();
        switch($method){

            case 'POST':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    // Entra directo al LoginController (API\REST\V1\Login\Controller\LoginController)
                    break;
                }
                if($routeName == "documentation"){
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'To access the documentation you need to use the GET method',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }

                ////// Start Resource Relational //////

                if(RESOURCE_CHILD == 'department'){
                    $resourcenameChild = RESOURCE_CHILD;
                    // La inicial de nuestro string la hacemos mayuscula
                    $resourceNameChild = ucfirst($resourcenameChild);
                    // Verificamos que exista el recurso
                    $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                    $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                    if($moduleResource == $moduleResourceChild){
                        switch($resourcenameChild){
                            case "department" :{
                                // Start resourceRelational
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourceNameChild = ucfirst($resourcenameChild);

                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                if(ID_RESOURCE_CHILD != null){

                                    return;

                                }else{

                                    $response = $e->getResponse();
                                    $response->setStatusCode(Response::STATUS_CODE_400);

                                    $body = array(
                                        'Error' => array(
                                            'HTTP_Status' => 400 . ' Bad Request',
                                            'Title' => 'Bad Request',
                                            'Details' => 'The id department is required',
                                        ),
                                    );

                                    switch($typeResponse){
                                        case "xml":{
                                            // Create the config object
                                            $writer = new \Zend\Config\Writer\Xml();
                                            return $response->setContent($writer->toString($body));
                                            $e->stopPropagation();
                                            break;
                                        }
                                        case "json":{
                                            $jsonModel = new JsonModel($body);
                                            $jsonModel->setTerminal(true);
                                            $e->setResult($jsonModel);
                                            $e->setViewModel($jsonModel)->stopPropagation();
                                            break;
                                        }
                                        default: {
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                        }
                                    }
                                }
                                break;
                            }
                        }
                    }
                }
                ////// End Resource Relational //////

                if(RESOURCE != null){
                    $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

                    switch($requestContentType){
                        case "application/x-www-form-urlencoded" :{

                            break;
                        }
                        case 'application/json':{

                            break;
                        }
                        default :{

                            $response = new Response();
                            $response->setStatusCode(Response::STATUS_CODE_400); //BAD REQUEST
                            $body = array(
                                'HTTP_Status' => '400' ,
                                'Title' => 'Bad Request' ,
                                'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                                'More_Info' => URL_API_DOCS
                            );

                            switch($typeResponse){
                                case "xml":{
                                    // Create the config object
                                    $writer = new \Zend\Config\Writer\Xml();
                                    return $response->setContent($writer->toString($body));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                            }
                        }
                    }

                    if(RESOURCE_CHILD != null){
                        $resourcenameChild = RESOURCE_CHILD;
                        // La inicial de nuestro string la hacemos mayuscula
                        $resourceName = ucfirst(RESOURCE);
                        $resourceNameChild = ucfirst($resourcenameChild);
                        // Verificamos que exista el recurso
                        $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                        // Si sí existe el recurso
                        if($moduleResourceChild){
                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);

                            // Si el resource y el resourceChild pertenecen al mismo módulo
                            if($moduleResource == $moduleResourceChild){

                                // Si el module de resource y el module de resourceChild son iguales

                            }else{

                                // Entrará en casos como clienttax ya que este recurso pertenece a SATMexico

                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);
                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                            }
                        }else{
                            // Entró porque haremos una concatenación del resource con el resourceChild
                            // Ejemplo: clientaddress, clientfile, etc
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);

                            // Verificamos que exista el recurso
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si sí existe el recurso
                            if($moduleResourceChild){

                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                            }else{
                                $response->setStatusCode(Response::STATUS_CODE_404);
                                $statusCode = $response->getStatusCode();

                                $body = array(
                                    'HTTP_Status' => $statusCode,
                                    'Title' => 'Not Found' ,
                                    'Details' => 'Resource not found',
                                    'More_Info' => URL_API_DOCS
                                );
                                switch($typeResponse){
                                    case "xml":{
                                        // Create the config object
                                        $writer = new \Zend\Config\Writer\Xml();
                                        return $response->setContent($writer->toString($body));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                    }
                                }
                            }
                        }

                        break;
                    }else{
                        $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                        $resourceNameChild = ucfirst($resourcenameChild);
                        define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                        define('NAME_RESOURCE_CHILD', $resourceNameChild);
                    }
                    define('MODULE_RESOURCE', ResourceManager::getModule(ucfirst(RESOURCE)));
                }else{
                    $response->setStatusCode(Response::STATUS_CODE_404);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Not Found' ,
                        'Details' => 'Resource not found',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }

                break;
            }
            case 'GET':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    $response = new Response();
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'To access the login you need to use the POST method',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                if($routeName == "documentation"){
                    // Entra directo al IndexController de Documentation (API\REST\V1\Documentation\Controller\IndexController)
                    break;
                }
                // Si resource es diferente de null
                if(RESOURCE != null){
                    if(RESOURCE_CHILD != null){
                        // Almacenamos RESOURCE.RESOURCE_CHILD en una variable
                        $resourcenameChild = RESOURCE_CHILD;
                        // La inicial de nuestro string la hacemos mayuscula
                        $resourceNameChild = ucfirst($resourcenameChild);
                        // Almacenamos el modulo al que pertenece resource
                        $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                        // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                        // Si resourceChild pertenece a un modulo (Esto significa que resourceChild sí es un recurso)
                        if($moduleResourceChild){
                            // Si el resource y el resourceChild pertenecen al mismo módulo
                            if($moduleResource == $moduleResourceChild){
                                switch(RESOURCE_CHILD){
                                    case "department" :{
                                        $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                        // La inicial de nuestro string la hacemos mayuscula
                                        $resourceNameChild = ucfirst($resourcenameChild);
                                        // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                        // Si no existe el modulo de resourceChild el resourceChild no existe
                                        if($moduleResourceChild){
                                            define('MODULE_RESOURCE', $moduleResource);
                                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                            if(ID_RESOURCE_CHILD != null){

                                                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                $e->getRouteMatch()->setParam('action', 'getResourceChild');
                                                return;

                                            }else{

                                                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                                return;

                                            }
                                        }else{
                                            //// Si no existe el resourceChild (Ejemplo: Branchaddress, Branchfile, etc...)
                                            $response->setStatusCode(Response::STATUS_CODE_404);
                                            $statusCode = $response->getStatusCode();

                                            $body = array(
                                                'HTTP_Status' => $statusCode,
                                                'Title' => 'Not Found' ,
                                                'Details' => 'Resource not found',
                                                'More_Info' => URL_API_DOCS
                                            );
                                            switch($typeResponse){
                                                case "xml":{
                                                    // Create the config object
                                                    $writer = new \Zend\Config\Writer\Xml();
                                                    return $response->setContent($writer->toString($body));
                                                    $e->stopPropagation();
                                                    break;
                                                }
                                                case "json":{
                                                    $jsonModel = new JsonModel($body);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                }
                                                default: {
                                                $jsonModel = new JsonModel($body);
                                                $jsonModel->setTerminal(true);
                                                $e->setResult($jsonModel);
                                                $e->setViewModel($jsonModel)->stopPropagation();
                                                break;
                                                }
                                            }
                                        }
                                        break;
                                    }
                                    case "staff" :{
                                        switch(RESOURCE){
                                            case "branch":{

                                                $resourcename = RESOURCE;
                                                // La inicial de nuestro string la hacemos mayuscula
                                                $resourceName = ucfirst($resourcename);
                                                // Almacenamos el modulo al que pertenece resource.
                                                $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());

                                                $resourcenameChild = RESOURCE_CHILD;
                                                // La inicial de nuestro string la hacemos mayuscula
                                                $resourceNameChild = ucfirst($resourcenameChild);
                                                // Almacenamos el modulo al que pertenece resourceChild.
                                                $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                                define('MODULE_RESOURCE', $moduleResource);
                                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                $e->getRouteMatch()->setParam('action', 'getListResourceAlternative');
                                                return;

                                            break;
                                            }

                                            default:{
                                                //// Si no existe el resourceChild (Ejemplo: Branchaddress, Branchfile, etc...)
                                                $response->setStatusCode(Response::STATUS_CODE_404);
                                                $statusCode = $response->getStatusCode();

                                                $body = array(
                                                    'HTTP_Status' => $statusCode,
                                                    'Title' => 'Not Found' ,
                                                    'Details' => 'Resource not found',
                                                    'More_Info' => URL_API_DOCS
                                                );
                                                switch($typeResponse){
                                                    case "xml":{
                                                        // Create the config object
                                                        $writer = new \Zend\Config\Writer\Xml();
                                                        return $response->setContent($writer->toString($body));
                                                        $e->stopPropagation();
                                                        break;
                                                    }
                                                    case "json":{
                                                        $jsonModel = new JsonModel($body);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                    }
                                                    default: {
                                                    $jsonModel = new JsonModel($body);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                    }
                                                }
                                            }
                                        }
                                        break;
                                    }
                                }
                            }else{

                                // Si resource y resourceChild no pertenecen al mismo módulo

                            }
                        }else{

                            // Almacenamos RESOURCE.RESOURCE_CHILD en una variable
                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                            // Si no existe el modulo de resourceChild el resourceChild no existe
                            if($moduleResourceChild){
                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                if(ID_RESOURCE_CHILD != null){

                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                    $e->getRouteMatch()->setParam('action', 'getResourceChild');
                                    return;

                                }else{

                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                    $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                    return;

                                }
                            }else{
                                //// Si no existe el resourceChild (Ejemplo: Branchaddress, Branchfile, etc...)
                                $response->setStatusCode(Response::STATUS_CODE_404);
                                $statusCode = $response->getStatusCode();

                                $body = array(
                                    'HTTP_Status' => $statusCode,
                                    'Title' => 'Not Found' ,
                                    'Details' => 'Resource not found',
                                    'More_Info' => URL_API_DOCS
                                );
                                switch($typeResponse){
                                    case "xml":{
                                        // Create the config object
                                        $writer = new \Zend\Config\Writer\Xml();
                                        return $response->setContent($writer->toString($body));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                    }
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ucfirst($e->getRouteMatch()->getMatchedRouteName()));
                }else{
                    $response->setStatusCode(Response::STATUS_CODE_404);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Not Found' ,
                        'Details' => 'Resource not found',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                break;
            }
            case 'PUT':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    $response = new Response();
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'To access the login you need to use the POST method',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                if($routeName == "documentation"){
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'To access the documentation you need to use the GET method',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }

                ////// Start Resource Relational //////

                if(RESOURCE_CHILD == 'department'){
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'Methods allowed: GET, POST, DELETE',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                ////// End Resource Relational //////

                if(RESOURCE != null){
                    $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

                    switch($requestContentType){
                        case "application/x-www-form-urlencoded" :{

                            break;
                        }
                        case 'application/json':{

                            break;
                        }
                        default :{

                            $response = new Response();
                            $response->setStatusCode(Response::STATUS_CODE_400); //BAD REQUEST
                            $body = array(
                                'HTTP_Status' => '400' ,
                                'Title' => 'Bad Request' ,
                                'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                                'More_Info' => URL_API_DOCS
                            );

                            switch($typeResponse){
                                case "xml":{
                                    // Create the config object
                                    $writer = new \Zend\Config\Writer\Xml();
                                    return $response->setContent($writer->toString($body));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                            }
                        }
                    }
                    if(RESOURCE_CHILD != null){
                        $resourcenameChild = RESOURCE_CHILD;
                        // La inicial de nuestro string la hacemos mayuscula
                        $resourceName = ucfirst(RESOURCE);
                        $resourceNameChild = ucfirst($resourcenameChild);
                        // Verificamos que exista el recurso
                        $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                        // Si sí existe el recurso
                        if($moduleResourceChild){
                            // Si el resource y el resourceChild pertenecen al mismo módulo
                            if($moduleResource == $moduleResourceChild){
                                switch($resourcenameChild){
                                    case "department" :{
                                        define('MODULE_RESOURCE', $moduleResource);
                                        define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                        define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                        define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                        if(ID_RESOURCE_CHILD != null){

                                            return;

                                        }else{

                                            $response = $e->getResponse();
                                            $response->setStatusCode(Response::STATUS_CODE_400);

                                            $body = array(
                                                'Error' => array(
                                                    'HTTP_Status' => 400 . ' Bad Request',
                                                    'Title' => 'Bad Request',
                                                    'Details' => 'The id department is required',
                                                ),
                                            );

                                            switch($typeResponse){
                                                case "xml":{
                                                    // Create the config object
                                                    $writer = new \Zend\Config\Writer\Xml();
                                                    return $response->setContent($writer->toString($body));
                                                    $e->stopPropagation();
                                                    break;
                                                }
                                                case "json":{
                                                    $jsonModel = new JsonModel($body);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                }
                                                default: {
                                                $jsonModel = new JsonModel($body);
                                                $jsonModel->setTerminal(true);
                                                $e->setResult($jsonModel);
                                                $e->setViewModel($jsonModel)->stopPropagation();
                                                break;
                                                }
                                            }
                                        }
                                        break;
                                    }
                                }
                            }else{

                                // Si resource y resorceChild son de modulos diferentes
                                // Tomar el modulo de recourceChild, dandole prioridad para trabajar.

                            }
                        }else{
                            // Si resourceChild no es un recurso

                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                            define('MODULE_RESOURCE', $moduleResource);
                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                        }
                        if(ID_RESOURCE_CHILD != null){

                            return;

                        }else{

                            $response = $e->getResponse();
                            $response->setStatusCode(Response::STATUS_CODE_400);

                            $body = array(
                                'Error' => array(
                                    'HTTP_Status' => 400 . ' Bad Request',
                                    'Title' => 'Bad Request',
                                    'Details' => 'The id'.RESOURCE_CHILD.' is required',
                                ),
                            );

                            switch($typeResponse){
                                case "xml":{
                                    // Create the config object
                                    $writer = new \Zend\Config\Writer\Xml();
                                    return $response->setContent($writer->toString($body));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $jsonModel = new JsonModel($body);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }

                    // If request id is null
                    if(ID_RESOURCE == null){

                        $response = new Response();
                        $response->setStatusCode(Response::STATUS_CODE_400);
                        $statusCode = $response->getStatusCode();

                        $body = array(
                            'HTTP_Status' => $statusCode,
                            'Method' => 'PUT' ,
                            'Title' => 'The request id is null' ,
                            'Details' => 'The request id'.RESOURCE.' can´t be null',
                            'More_Info' => URL_API_DOCS
                        );
                        switch($typeResponse){
                            case "xml":{
                                // Create the config object
                                $writer = new \Zend\Config\Writer\Xml();
                                return $response->setContent($writer->toString($body));
                                $e->stopPropagation();
                                break;
                            }
                            case "json":{
                                $jsonModel = new JsonModel($body);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                            }
                            default: {
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                            }
                        }
                    }else{

                        $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

                        switch($requestContentType){
                            case "application/x-www-form-urlencoded" :{

                                break;
                            }
                            case 'application/json':{

                                break;
                            }
                            default :{

                                $response->setStatusCode(Response::STATUS_CODE_400); //BAD REQUEST
                                $body = array(
                                    'HTTP_Status' => '400' ,
                                    'Title' => 'Bad Request' ,
                                    'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                                    'More_Info' => URL_API_DOCS
                                );

                                switch($typeResponse){
                                    case "xml":{
                                        // Create the config object
                                        $writer = new \Zend\Config\Writer\Xml();
                                        return $response->setContent($writer->toString($body));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ResourceManager::getModule(ucfirst(RESOURCE)));
                }else{
                    $response->setStatusCode(Response::STATUS_CODE_404);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Not Found' ,
                        'Details' => 'Resource not found',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                break;
            }
            case 'DELETE':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'To access the login you need to use the POST method',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                if($routeName == "documentation"){
                    $response->setStatusCode(Response::STATUS_CODE_405);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Method not allowed',
                        'Details' => 'To access the documentation you need to use the GET method',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                if(RESOURCE != null){
                    if(RESOURCE_CHILD != null){
                        $resourcenameChild = RESOURCE_CHILD;
                        // La inicial de nuestro string la hacemos mayuscula
                        $resourceName = ucfirst(RESOURCE);
                        $resourceNameChild = ucfirst($resourcenameChild);
                        // Verificamos que exista el recurso
                        $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                        // Si sí existe el recurso
                        if($moduleResourceChild){
                            $resourcenameChild = RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);
                            define('MODULE_RESOURCE', $moduleResource);
                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                        }else{
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);

                            // Verificamos que exista el recurso
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                            define('MODULE_RESOURCE', $moduleResource);
                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                        }
                        switch(RESOURCE_CHILD){
                            case "department" :{

                                if(ID_RESOURCE_CHILD != null){

                                    return;

                                }else{

                                    $response->setStatusCode(Response::STATUS_CODE_400);

                                    $body = array(
                                        'Error' => array(
                                            'HTTP_Status' => 400 . ' Bad Request',
                                            'Title' => 'Bad Request',
                                            'Details' => 'The id department is required',
                                        ),
                                    );

                                    switch($typeResponse){
                                        case "xml":{
                                            // Create the config object
                                            $writer = new \Zend\Config\Writer\Xml();
                                            return $response->setContent($writer->toString($body));
                                            $e->stopPropagation();
                                            break;
                                        }
                                        case "json":{
                                            $jsonModel = new JsonModel($body);
                                            $jsonModel->setTerminal(true);
                                            $e->setResult($jsonModel);
                                            $e->setViewModel($jsonModel)->stopPropagation();
                                            break;
                                        }
                                        default: {
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                        }
                                    }
                                }
                                break;
                            }
                        }
                        // If request id is null
                        if(ID_RESOURCE == null){

                            $response->setStatusCode(Response::STATUS_CODE_400);
                            $statusCode = $response->getStatusCode();

                            $body = array(
                                'HTTP_Status' => $statusCode,
                                'Title' => 'The request id is null' ,
                                'Details' => 'The request id can´t be null',
                                'More_Info' => URL_API_DOCS
                            );
                            switch($typeResponse){
                                case "xml":{
                                    // Create the config object
                                    $writer = new \Zend\Config\Writer\Xml();
                                    return $response->setContent($writer->toString($body));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $jsonModel = new JsonModel($body);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }
                }else{
                    $response->setStatusCode(Response::STATUS_CODE_404);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Title' => 'Not Found' ,
                        'Details' => 'Resource not found',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                // If request id is null
                if(ID_RESOURCE == null){

                    $response = new Response();
                    $response->setStatusCode(Response::STATUS_CODE_400);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP_Status' => $statusCode,
                        'Method' => 'PUT' ,
                        'Title' => 'The request id is null' ,
                        'Details' => 'The request id'.RESOURCE.' can´t be null',
                        'More_Info' => URL_API_DOCS
                    );
                    switch($typeResponse){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($body));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $jsonModel = new JsonModel($body);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                break;
            }
            break;
        }
    }
}