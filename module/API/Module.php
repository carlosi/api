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
use Shared\CustomListener\TokenListener;
use Shared\CustomListener\ApiProblemListener;

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
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                	'Company' 	    => __DIR__ . '/src/' . 'Company',
                	'Contents' 	    => __DIR__ . '/src/' . 'Contents',
                	'Documentation' => __DIR__ . '/src/' . 'Documentation',
                	'Sales'		    => __DIR__ . '/src/' . 'Sales',
                        'Shared' 	    => __DIR__ . '/src/' . 'Shared',
                        'Manufacture' 	=> __DIR__ . '/src/' . 'Manufacture',
                        'Test' 	=> __DIR__ . '/src/' . 'Test',
                ),
            ),
        );
    }
}
