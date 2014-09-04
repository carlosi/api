<?php

/**
 * TokenListener.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
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
class TokenListener implements ListenerAggregateInterface {

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

        define('API_VERSION', $e->getRouteMatch()->getParam('version'));
        define('TYPE_RESPONSE', $e->getRouteMatch()->getParam('typeResponse'));
        define('URL_API_DOCS', 'http://api.rest.buybuy.com.mx/docs');
        define('URL_API', 'http://api.rest.buybuy.com.mx');

        if ($e->getRouteMatch()->getMatchedRouteName() != 'login'){
            $token = $e->getRequest()->getHeader('Authorization') ? $e->getRequest()->getHeader('Authorization')->getFieldValue() : null;

            if($token){
                if(ResourceManager::TokenIsValid($token)){

                }else{
                    $response = $e->getResponse();
                    $response->setStatusCode(Response::STATUS_CODE_401);
                    $response->getHeaders()->addHeaderLine('Message', 'Invalid or expired token');

                    $body = array(
                        'HTTP_Status' => '401' ,
                        'Title' => 'Unauthorized' ,
                        'Details' => 'Invalid or expired token',
                        'More_Info' => URL_API_DOCS
                    );

                    switch(TYPE_RESPONSE){
                        case "xml":{
                            // Create the config object
                            $writer = new \Zend\Config\Writer\Xml();
                            $xmlModel = $response->setContent($writer->toString($body));
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
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
            }else{
                $response = $e->getResponse();
                $response->setStatusCode(Response::STATUS_CODE_499);
                $body = array(
                    'HTTP_Status' => '499' ,
                    'Title' => 'Token required' ,
                    'Details' => 'Token is required',
                    'More_Info' => URL_API_DOCS
                );

                switch(TYPE_RESPONSE){
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
?>