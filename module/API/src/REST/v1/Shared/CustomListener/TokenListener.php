<?php 

namespace REST\v1\Shared\CustomListener;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use REST\v1\Shared\Functions\SessionManager;
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
        define('WEBSITE_API_DOCS', 'http://buybuy.com/api/docs');
        define('WEBSITE_API', 'http://dev.api.buybuy.com.mx');


        // Utilizar en otro lisener
        $routeLogin = $e->getRouteMatch()->getMatchedRouteName();

        if($routeLogin == "login"){

            $request = $e->getRequest();
            $response = $e->getResponse();

            if($request->getHeaders()->get('Content-Type') == null){

                $method = $request->getMethod();

                $response->setStatusCode(Response::STATUS_CODE_400);
                $statusCode = $response->getStatusCode();
                $body = array(
                    'HTTP Status' => $statusCode,
                    'Method' => $method,
                    'Title' => 'The request method '.$method.' is not allowed' ,
                    'Details' => 'The request method allow is POST',
                    'More Info' => 'http://buybuy.com/api/docs'
                );
                $jsonModel = new JsonModel($body);
                $jsonModel->setTerminal(true);
                $e->setResult($jsonModel);
                $e->setViewModel($jsonModel)->stopPropagation();
            }
        }
        // Utilizar en otro lisener

        $token = $e->getRouteMatch()->getParam('token') ? $e->getRouteMatch()->getParam('token') : null;
        if(SessionManager::TokenIsValid($token)){

        }else{
            $response = $e->getResponse();
            $response->setStatusCode(Response::STATUS_CODE_401);
            $response->getHeaders()->addHeaderLine('Message', 'Invalid or expired token');

            if(SessionManager::TokenIsValid($token)){

            }else{
                $response = $e->getResponse();
                $response->setStatusCode(Response::STATUS_CODE_401);
                $response->getHeaders()->addHeaderLine('Message', 'Invalid or expired token');

                $body = array(
                        'HTTP Status' => '401' ,
                        'Title' => 'Unauthorized' ,
                        'Details' => 'Invalid or expired token',
                        'More Info' => WEBSITE_API_DOCS
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
