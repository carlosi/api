<?php

/**
 * TokenListener.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\CustomListener;

// - ZF2 - //
use API\REST\V1\Shared\Functions\ResourceManager;
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\Model\JsonModel;
use Zend\Http\Response;

// - Shared - //
use API\REST\V1\Shared\Functions\SessionManager;

/**
 * Class TokenListener
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

        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 800);

    }

    /**
     * @param EventManagerInterface $events
     */
    //El método dettach() lo unico que hace es remover el listener del evento
    public function detach(EventManagerInterface $events){

        foreach ($this->listeners as $index => $listener){

            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * @param MvcEvent $e
     */
    //Se toma desiciones personales para la aplicación
    public function onDispatch(MvcEvent $e){

        $response = $e->getResponse();
        $request  = $e->getRequest();

        $method = $request->getMethod();
        switch($method){
            case 'GET':{
                $routeName = $e->getRouteMatch()->getMatchedRouteName();

                if($routeName == "documentation"){
                    // Entra directo al IndexController (API\REST\V1\Documentation\Controller\Indexontroller)
                }else{

                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
                    define('RESOURCE_CHILD', $e->getRouteMatch()->getParam('resourceChild'));

                    if(RESOURCE != null){
                        $id = $e->getRouteMatch()->getParam('id');
                        if(RESOURCE_CHILD != null){
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourcenameChild = RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si sí existe el recurso
                            if($hasResourceChild){
                                if($id != null){

                                    $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                    $resourceNameChild = ucfirst($resourcenameChild);

                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $hasResourceChild);
                                    define('ID_RESOURCE', $id);
                                    define('ID_RESOURCE_CHILD', $e->getRouteMatch()->getParam('idChild'));

                                    if(ID_RESOURCE_CHILD!=null){
                                        $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                        $e->getRouteMatch()->setParam('function', 'getList');
                                    }else{
                                        $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                        $e->getRouteMatch()->setParam('action', 'getListChild');
                                    }
                                }else{
                                    $response->setStatusCode(Response::STATUS_CODE_409);
                                    $statusCode = $response->getStatusCode();

                                    $body = array(
                                        'HTTP Status' => $statusCode,
                                        'Title' => 'Conflict' ,
                                        'Details' => 'The request could not be processed because resource '.RESOURCE.' need an id',
                                        'More Info' => 'http://rest.api.buybuy.com.mx/docs/'.RESOURCE
                                    );
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                }
                            }else{

                                // La inicial de nuestro string la hacemos mayuscula
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Verificamos que exista el recurso
                                $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                                // Si sí existe el recurso
                                if($hasResourceChild){
                                    if($id != null){

                                        define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                        define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                        define('MODULE_RESOURCE_CHILD', $hasResourceChild);
                                        define('ID_RESOURCE', $id);
                                        define('ID_RESOURCE_CHILD', $e->getRouteMatch()->getParam('idChild'));

                                        if(ID_RESOURCE_CHILD!=null){
                                            $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                            $e->getRouteMatch()->setParam('function', 'getList');
                                        }else{
                                            $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                            $e->getRouteMatch()->setParam('action', 'getListChild');
                                        }
                                    }else{
                                        $response->setStatusCode(Response::STATUS_CODE_409);
                                        $statusCode = $response->getStatusCode();

                                        $body = array(
                                            'HTTP Status' => $statusCode,
                                            'Title' => 'Conflict' ,
                                            'Details' => 'The request could not be processed because resource '.RESOURCE.' need an id',
                                            'More Info' => 'http://rest.api.buybuy.com.mx/docs/'.RESOURCE
                                        );
                                        $jsonModel = new JsonModel($body);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                    }
                                }else{
                                    $response->setStatusCode(Response::STATUS_CODE_404);
                                    $statusCode = $response->getStatusCode();

                                    $body = array(
                                        'HTTP Status' => $statusCode,
                                        'Title' => 'Not Found' ,
                                        'Details' => 'Resource not found',
                                        'More Info' => 'http://rest.api.buybuy.com.mx/docs'
                                    );
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                }
                            }
                        }
                        define('MODULE_RESOURCE', ResourceManager::getModule(ucfirst(RESOURCE)));
                    }else{
                        $response->setStatusCode(Response::STATUS_CODE_404);
                        $statusCode = $response->getStatusCode();

                        $body = array(
                            'HTTP Status' => $statusCode,
                            'Title' => 'Not Found' ,
                            'Details' => 'Resource not found',
                            'More Info' => 'http://rest.api.buybuy.com.mx/docs'
                        );
                        $jsonModel = new JsonModel($body);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                    }
                }
                break;
            }
            case 'POST':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    // Entra directo al LoginController (API\REST\V1\Login\Controller\LoginController)
                }else{

                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
                    define('RESOURCE_CHILD', $e->getRouteMatch()->getParam('resourceChild'));

                    if(RESOURCE != null){
                        if(RESOURCE_CHILD != null){
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourcenameChild = RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si sí existe el recurso
                            if($hasResourceChild){
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $hasResourceChild);

                            }else{
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Verificamos que exista el recurso
                                $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                                // Si sí existe el recurso
                                if($hasResourceChild){

                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $hasResourceChild);

                                }else{
                                    $response->setStatusCode(Response::STATUS_CODE_404);
                                    $statusCode = $response->getStatusCode();

                                    $body = array(
                                        'HTTP Status' => $statusCode,
                                        'Title' => 'Not Found' ,
                                        'Details' => 'Resource not found',
                                        'More Info' => 'http://rest.api.buybuy.com.mx/docs'
                                    );
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ResourceManager::getModule(ucfirst(RESOURCE)));
                }
                break;
            }
            case 'PUT':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    // Entra directo al LoginController (API\REST\V1\Login\Controller\LoginController)
                }else{

                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
                    define('RESOURCE_CHILD', $e->getRouteMatch()->getParam('resourceChild'));

                    if(RESOURCE != null){
                        if(RESOURCE_CHILD != null){
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourcenameChild = RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si sí existe el recurso
                            if($hasResourceChild){
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $hasResourceChild);

                            }else{
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Verificamos que exista el recurso
                                $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                                // Si sí existe el recurso
                                if($hasResourceChild){

                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $hasResourceChild);

                                }else{
                                    $response->setStatusCode(Response::STATUS_CODE_404);
                                    $statusCode = $response->getStatusCode();

                                    $body = array(
                                        'HTTP Status' => $statusCode,
                                        'Title' => 'Not Found' ,
                                        'Details' => 'Resource not found',
                                        'More Info' => 'http://rest.api.buybuy.com.mx/docs'
                                    );
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ResourceManager::getModule(ucfirst(RESOURCE)));
                }
                break;
            }
            case 'DELETE':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    // Entra directo al LoginController (API\REST\V1\Login\Controller\LoginController)
                }else{

                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
                    define('RESOURCE_CHILD', $e->getRouteMatch()->getParam('resourceChild'));

                    if(RESOURCE != null){
                        if(RESOURCE_CHILD != null){
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourcenameChild = RESOURCE_CHILD;
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si sí existe el recurso
                            if($hasResourceChild){
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $hasResourceChild);

                            }else{
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Verificamos que exista el recurso
                                $hasResourceChild = ResourceManager::getModule($resourceNameChild);
                                // Si sí existe el recurso
                                if($hasResourceChild){

                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $hasResourceChild);

                                }else{
                                    $response->setStatusCode(Response::STATUS_CODE_404);
                                    $statusCode = $response->getStatusCode();

                                    $body = array(
                                        'HTTP Status' => $statusCode,
                                        'Title' => 'Not Found' ,
                                        'Details' => 'Resource not found',
                                        'More Info' => 'http://rest.api.buybuy.com.mx/docs'
                                    );
                                    $jsonModel = new JsonModel($body);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ResourceManager::getModule(ucfirst(RESOURCE)));
                }
                break;
            }
        }
    }
}
?>