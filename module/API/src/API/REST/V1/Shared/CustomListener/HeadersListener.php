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

/**
 * Class HeadersListener
 * @package API\REST\V1\Shared\CustomListener
 */
class HeadersListener implements ListenerAggregateInterface {

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

        $requestMethod = $e->getRequest()->getMethod();

        if($requestMethod == 'POST' || $requestMethod == 'PUT'){

            $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

            switch($requestContentType){
                case "application/x-www-form-urlencoded" :{

                    break;
                }
                case 'application/json':{

                    break;
                }
                default :{

                $resourceChild = $e->getRouteMatch()->getParam('resourceChild');
                $idChild = $e->getRouteMatch()->getParam('idChild');
                $typeResponse = $e->getRouteMatch()->getParam('typeResponse');

                    switch($resourceChild){
                        case "department" :{
                            if($requestMethod == 'POST'){
                                if($idChild != null){

                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                    $e->getRouteMatch()->setParam('action', 'createResourceRelational');

                                }else{

                                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
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
                            }
                            if($requestMethod == 'PUT'){
                                if($idChild != null){

                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                    $e->getRouteMatch()->setParam('action', 'updateResourceRelational');

                                }else{

                                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
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
                            }

                            break;
                        }
                        default :{
                            $response = new Response();
                            $response->setStatusCode(Response::STATUS_CODE_400); //BAD REQUEST
                            $body = array(
                                'HTTP_Status' => '400' ,
                                'Title' => 'Bad Request' ,
                                'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                                'More Info' => URL_API_DOCS
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
            }
        }
        if($requestMethod == 'DELETE'){
            $resourceChild = $e->getRouteMatch()->getParam('resourceChild');
            $idChild = $e->getRouteMatch()->getParam('idChild');
            $typeResponse = $e->getRouteMatch()->getParam('typeResponse');

            if($idChild != null){

                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                $e->getRouteMatch()->setParam('action', 'deleteResourceRelational');

            }else{

                define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
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
        }
    }
}