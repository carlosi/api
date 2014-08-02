<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace API;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use REST\v1\Shared\CustomListener\TokenListener;
use REST\v1\Shared\CustomListener\ApiProblemListener;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {

        $eventManager = $e->getApplication()->getEventManager();
        
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        //ApiProblemListener
        $apiProblemListener = new ApiProblemListener();
        $apiProblemListener->attach($eventManager);
        
        $tokenListener = new TokenListener();
        $tokenListener->attach($eventManager);
        
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',  
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'REST' 	    => __DIR__ . '/src/' . 'REST',
                    'RPC' 	    => __DIR__ . '/src/' . 'RPC'
                ),
            ),
            
        );
    }
}
