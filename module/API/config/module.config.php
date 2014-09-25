 <?php

 /**
  * module.config.php
  * BuyBuy
  *
  * Created by Buybuy on 12/08/2014.
  * Copyright (c) 2014 Buybuy. All rightreserved.
  */

return array(

    'router' => array(
        'routes' => array(
            //Login
            'login' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/login[/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Login\Controller\LoginController',
                        'action'     => 'login',
                    ),
                ),
            ),
            // Module Routes Documentation
            'documentation' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/documentation[/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Documentation\Controller\IndexController',
                        'action'	 => 'index',
                    ),
                    'constraints' => array(
                        'version' => '1',
                    ),
                ),
            ),
            // Module Routes Company
            'company' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/company/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => 'company|user|staff|client|branch|department',
                        'resourceChild' => 'staff|address|file|comment|department|leader|member',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes Contents
            'contents' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/contents/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes Expense
            'expense' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/expense/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes MercadoLibre
            'mercadolibre' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/mercadolibre/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes Production
            'production' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/production/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes Sales
            'sales' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/sales/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes SalesForce
            'salesforce' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/salesforce/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Routes SATMexico
            'satmexico' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/satmexico/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => 'client',
                        'resourceChild' => 'tax',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
            // Module Route Shipping
            'shipping' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/shipping/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => '',
                        'resourceChild' => '',
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
//    'input_filters' => array(
//        'abstract_factories' => array(
//            'ZF\ContentValidation\InputFilter\InputFilterAbstractServiceFactory',
//            //'ZF\ContentValidation\ContentValidationListener' => 'ZF\ContentValidation\ContentValidationListenerFactory',
//        ),
//    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    
//    'validators' => array(
//        'factories' => array(
//            'ZF\ContentValidation\Validator\DbRecordExists' => 'ZF\ContentValidation\Validator\Db\RecordExistsFactory',
//            /'ZF\ContentValidation\Validator\DbNoRecordExists' => 'ZF\ContentValidation\Validator\Db\NoRecordExistsFactory',
//        ),
//    ),
    
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(

            'API\REST\V1\Login\Controller\LoginController'                  => 'API\REST\V1\Login\Controller\LoginController',
            'API\REST\V1\Documentation\Controller\IndexController'          => 'API\REST\V1\Documentation\Controller\IndexController',
            'API\REST\V1\Controller\ResourceController'                     => 'API\REST\V1\Controller\ResourceController',

            ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
        	'ViewJsonStrategy',
        ),
        
    ),

);
