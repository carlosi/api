<?php

namespace Shared\V1\REST\CustomListener;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Http\Request as HttpRequest;
use Zend\View\Model\ModelInterface;

use Zend\Http\Response;
use Zend\View\Model\JsonModel;

/**
 * ApiProblemListener
 *
 * Provides a listener on the render event, at high priority.
 *
 * If the MvcEvent represents an error, then its view model and result are
 * replaced with a RestfulJsonModel containing an API-Problem payload.
 */
class ApiProblemListener implements ListenerAggregateInterface
{
    /**
     * Default values to match in Accept header
     *
     * @var string
     */
    protected static $acceptFilter = 'application/hal+json,application/api-problem+json,application/json';

    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();

    /**
     * Constructor
     *
     * Set the accept filter, if one is passed
     *
     * @param string $filter
     */
    public function __construct($filter = null)
    {
        if (is_string($filter) && !empty($filter)) {
            self::$acceptFilter = $filter;
        }
    }

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, __CLASS__ . '::onRender', 1000);
    }

    /**
     * @param EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * Listen to the render event
     *
     * @param MvcEvent $e
     */
    public static function onRender(MvcEvent $e)
    {

        $request = $e->getRequest();
        $response = $e->getResponse();
        $requestHeaders = $request->getHeaders();
        $responseHeaders = $response->getHeaders();

        // If method is PUT
        if($request->getMethod() == "PUT"){

            // getting id of route
            $id = $e->getRouteMatch()->getParam('id');
            // If request id is null
            if($id == null){

                $response->setStatusCode(Response::STATUS_CODE_400);
                $statusCode = $response->getStatusCode();

                $body = array(
                    'HTTP Status' => $statusCode,
                    'Method' => 'PUT' ,
                    'Title' => 'The request id is null' ,
                    'Details' => 'The request id can´t be null',
                    'More Info' => URL_API_DOCS
                );
                $jsonModel = new JsonModel($body);
                $jsonModel->setTerminal(true);
                $e->setResult($jsonModel);
                $e->setViewModel($jsonModel);
            }
        }

        // If method is PUT
        if($request->getMethod() == "DELETE"){

            // getting id of route
            $id = $e->getRouteMatch()->getParam('id');
            // If request id is null
            if($id == null){

                $response->setStatusCode(Response::STATUS_CODE_400);
                $statusCode = $response->getStatusCode();

                $body = array(
                    'HTTP Status' => $statusCode,
                    'Method' => 'DELETE' ,
                    'Title' => 'The request id is null' ,
                    'Details' => 'The request id can´t be null',
                    'More Info' => URL_API_DOCS
                );
                $jsonModel = new JsonModel($body);
                $jsonModel->setTerminal(true);
                $e->setResult($jsonModel);
                $e->setViewModel($jsonModel);
            }
        }

        // only worried about error pages
        if (!$e->isError()) {
            return;
        }

        // and then, only if we have an Accept header...
        if (!$request instanceof HttpRequest) {
            return;
        }

        if (!$requestHeaders->has('Accept')) {
            return;
        }

        // ... that matches certain criteria
        $accept = $requestHeaders->get('Accept');
        $match = $accept->match(self::$acceptFilter);

        if (!$match || $match->getTypeString() == '*/*') {

            // Obtenemos el StatusCode
            $responseStatusCode = $response->getStatusCode();
   
            switch($responseStatusCode){
                case '404':{

                    $response->setStatusCode(Response::STATUS_CODE_404);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP Status' => $statusCode,
                        'Title' => 'Not Found' ,
                        'Details' => 'Resource not found',
                        'More Info' => URL_API_DOCS
                    );
                    $jsonModel = new JsonModel($body);
                    $jsonModel->setTerminal(true);
                    $e->setResult($jsonModel);
                    $e->setViewModel($jsonModel);
                    break;
                }
                case '500':{

                    $response->setStatusCode(Response::STATUS_CODE_500);
                    $statusCode = $response->getStatusCode();

                    $body = array(
                        'HTTP Status' => $statusCode ,
                        'Title' => 'Internal Server Error' ,
                        'More Info' => URL_API_DOCS
                    );

                    if($requestHeaders->get('Content-Type') == null){

                    }else{
                        $getContentType = $requestHeaders->get('Content-Type')->getMediaType();
                        $getContentBody = $request->getContent($getContentType);

                        // Validate that the Body ​​are of type json
                        $decodeJson = json_decode($getContentBody);
                        if($decodeJson == null){

                            $response->setStatusCode(Response::STATUS_CODE_400);
                            $responseHeaders->addHeaderLine('Message', 'Sintax Error');
                            $statusCode = $response->getStatusCode();

                            $body = array(
                                'HTTP Status' => $statusCode,
                                'Title' => 'Bad Request' ,
                                'Details' => 'JSON Sintax Error',
                                'More Info' => URL_API_DOCS
                            );
                        }
                    }
                    $jsonModel = new JsonModel($body);
                    $jsonModel->setTerminal(true);
                    $e->setResult($jsonModel);
                    $e->setViewModel($jsonModel);
                    break;
                }
            }
            return;
        }
    }
}