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
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\Model\JsonModel;
use Zend\Http\Response;

// - Functions - //
use API\REST\V1\Shared\Functions\SessionManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

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
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 950);

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
        define('MODULE', $e->getRouteMatch()->getMatchedRouteName());
        define('TYPE_RESPONSE', $e->getRouteMatch()->getParam('typeResponse'));
        define('URL_API_DOCS', 'http://api.rest.buybuy.com.mx/documentation');
        define('URL_API', 'http://api.rest.buybuy.com.mx');

        $response = $e->getResponse();
        $responseHeaders = $response->getHeaders();

        if($e->getRouteMatch()->getMatchedRouteName() != 'login'){
            if($e->getRouteMatch()->getMatchedRouteName() != 'documentation'){
                $token = $e->getRequest()->getHeader('Authorization') ? $e->getRequest()->getHeader('Authorization')->getFieldValue() : null;

                if($token){
                    if(SessionManager::TokenIsValid($token)){

                    }else{
                        define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
                        $bodyResponse = ArrayResponse::getResponse(498, $response);
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                $writer = new \Zend\Config\Writer\Xml();
                                return $response->setContent($writer->toString($bodyResponse));
                                $e->stopPropagation();
                                break;
                            }
                            case "json":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                            }
                            default: {
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                            }
                        }
                    }
                }else{
                    define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
                    $response = $e->getResponse();
                    $bodyResponse = ArrayResponse::getResponse(499, $response);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            $writer = new \Zend\Config\Writer\Xml();
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
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
?>