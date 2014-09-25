<?php
/**
 * Module.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API;

// - ZF2 - //
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

// - Shared - //
use API\REST\V1\Shared\CustomListener\ApiProblemListener;
use API\REST\V1\Shared\CustomListener\TokenListener;
use API\REST\V1\Shared\CustomListener\ResourceListener;

/**
 * Class Module
 * @package API
 */
class Module
{
    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {

        $eventManager = $e->getApplication()->getEventManager();
        
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);


        //ApiProblemListener
        $apiProblemListener = new ApiProblemListener();
        $apiProblemListener->attach($eventManager);

        //TokenListener
        $tokenListener = new TokenListener();
        $tokenListener->attach($eventManager);

        //ResourceListener
        $resourceListener = new ResourceListener();
        $resourceListener->attach($eventManager);

    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'API' 	    => __DIR__ . '/src/' . 'API/',
                ),
            ),
        );
    }
}
