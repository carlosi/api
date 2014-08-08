<?php

namespace Shared\V1\REST\CustomListener;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\Model\JsonModel;
use Zend\Http\Response;
use Shared\V1\REST\Functions\HttpRequest;

class ContentTypeListener implements ListenerAggregateInterface {

    /*Primero registramos el listener y asignamos una proridad alta (1000 es la mas alta)
     * para que se ejecute lo antes posible dentro del stack de
     * listeners registrados en el evento.
     */

    protected $listeners = array();

    public function attach(EventManagerInterface $events){

        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 900);

    }

    //El método dettach() lo unico que hace es remover el listener del evento
    public function detach(EventManagerInterface $events){

        foreach ($this->listeners as $index => $listener){

            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }

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
                $response = new Response();
                $response->setStatusCode(Response::STATUS_CODE_400); //BAD REQUEST
                $body = array(
                    'HTTP Status' => '400' ,
                    'Title' => 'Bad Request' ,
                    'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                    'More Info' => URL_API_DOCS
                );

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