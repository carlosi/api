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
use Shared\V1\REST\CustomListener\TokenListener;
use Shared\V1\REST\CustomListener\ApiProblemListener;
use Shared\V1\REST\CustomListener\ContentTypeListener;

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

        //ContentTypeListener
        $contentTypeListener = new ContentTypeListener();
        $contentTypeListener->attach($eventManager);

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
                    'Company'         => __DIR__ . '/src/' . 'Company/',
                    'Contents'         => __DIR__ . '/src/' . 'Contents/',
                    'Documentation' => __DIR__ . '/src/' . 'Documentation/',
                    'Expense'        => __DIR__ . '/src/' . 'Expense/',
                    'Login'         => __DIR__ . '/src/' . 'Login/',
                    'MercadoLibre'  => __DIR__ . '/src/' . 'MercadoLibre/',
                    'Production'    => __DIR__ . '/src/' . 'Production/',
                    'Project'        => __DIR__ . '/src/' . 'Project/',
                    'Sales'            => __DIR__ . '/src/' . 'Sales/',
                    'SATMexico'        => __DIR__ . '/src/' . 'SATMexico/',
                    'Shared'        => __DIR__ . '/src/' . 'Shared/',
                    'Shipping'        => __DIR__ . '/src/' . 'Shipping/',

                ),
            ),
        );
    }
}