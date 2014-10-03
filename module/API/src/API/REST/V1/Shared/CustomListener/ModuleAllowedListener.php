<?php
/**
 * ModuleAllowedListener.php
 * BuyBuy
 *
 * Created by Buybuy on 02/10/14.
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
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

// - Propel - //
use CompanyQuery;

class ModuleAllowedListener {
    /* Primero registramos el listener y asignamos una proridad alta (1000 es la mas alta)
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
        $writer = new \Zend\Config\Writer\Xml();

        $request = $e->getRequest();
        $response = $e->getResponse();
        switch($e->getRouteMatch()->getParam('resource')){
            case "company":{
                //Obtenemos el token por medio del parametro Authorization del método getHeader. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
                $token = $request->getHeader('Authorization')->getFieldValue();;

                //Obtenemos el IdCompany al que pertenece el usuario
                $idCompany = ResourceManager::getIDCompany($token);

                $companyBuybuy = CompanyQuery::create()->filterByCompanyName('Buybuy Inc.')->findOne();
                $idcompanyBuybuy = $companyBuybuy->getIdcompany();

                // Solamente el idcompany de Buybuy podrá eliminar entidades de Compañias.
                if($idcompanyBuybuy == $idCompany){

                    // Sale de este Listener

                }
                // (Buybuy no podrá hacer CRUD ante las demas compañias sobre el recurso companyaddres, solamente sobre su misma compañia, o sea, sobre Buybuy)
                // Cualquie company puede hacer el CRUD sobre el recurso companyaddress.
                elseif($e->getRouteMatch()->getParam('resourceChild') == 'address'){
                    switch($request->getMethod()){
                        case "POST":{

                            break;
                        }
                        case "GET":{
                            if($e->getRouteMatch()->getParam('idChild') != null){
                                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                $e->getRouteMatch()->setParam('action', 'getResourceChild');
                                return;
                            }
                            break;
                        }
                        case "PUT":{

                            break;
                        }
                        case "DELETE":{

                            break;
                        }
                    }
                }else{
                    $bodyResponse = ArrayResponse::getResponse(401, $response, 'Sorry but you does not have permission over this resource.', 'Access denied');
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
        }
    }
}