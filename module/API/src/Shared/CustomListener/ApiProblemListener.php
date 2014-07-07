<?php

namespace Shared\CustomListener;

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
                        'More Info' => 'http://buybuy.com/api/docs'
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
                        'More Info' => 'http://buybuy.com/api/docs'
                    );

                    $getContentType = $requestHeaders->get('Content-Type')->getMediaType();
                    $getContentBody = $request->getContent($getContentType);

                    // Validate that the Body ​​are of type json
                    $decodeJson = json_decode($getContentBody);
                    if($decodeJson == null){

                        $response->setStatusCode(Response::STATUS_CODE_400);
                        $response->getHeaders()->addHeaderLine('Message', 'Sintax Error');
                        $statusCode = $response->getStatusCode();

                        $body = array(
                            'HTTP Status' => $statusCode,
                            'Title' => 'Bad Request' ,
                            'Details' => 'JSON Sintax Error',
                            'More Info' => 'http://buybuy.com/api/docs'
                        );
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