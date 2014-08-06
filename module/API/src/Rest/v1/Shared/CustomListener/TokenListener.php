<?php 

namespace Shared\CustomListener;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Shared\Functions\SessionManager;
use Zend\View\Model\JsonModel;
use Zend\Http\Response;



class TokenListener implements ListenerAggregateInterface {
    
    
    
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
        
        if ($e->getRouteMatch()->getMatchedRouteName() != 'login'){
            $token = $e->getRouteMatch()->getParam('token') ? $e->getRouteMatch()->getParam('token') : null;
            if(SessionManager::TokenIsValid($token)){
                define('RESOURCE',$e->getRouteMatch()->getMatchedRouteName());
                define('API_VERSION', $e->getRouteMatch()->getParam('version'));
                define('URL_API_DOCS', URL_API_DOCS);
                define('URL_API', 'http://api.rest.buybuy.com.mx');
            }else{        
                $response = $e->getResponse();
                $response->setStatusCode(Response::STATUS_CODE_401);
                $response->getHeaders()->addHeaderLine('Message', 'Invalid or expired token');

                $body = array(
                        'HTTP Status' => '401' ,
                        'Title' => 'Unauthorized' ,
                        'Details' => 'Invalid or expired token',
                        'More Info' => URL_API_DOCS
                );

                 $jsonModel = new JsonModel($body);
                 $jsonModel->setTerminal(true);
                 $e->setResult($jsonModel);
                 $e->setViewModel($jsonModel)->stopPropagation();
            }
        }
        
        
        
    }
}
?>
