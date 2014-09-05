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
            // All Module Routes
            'resources' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version][/:typeResponse]/:resource[/:id][/:resourceChild][/:idChild][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'idChild' => '[0-9]+',
                        'version' => '1',
                        'typeResponse' => 'xml|json',
                        'resource' => 'company|branch|client|bankaccount|user|project|order|mxtaxdocument|department|marketingchannel|marketingcampaign',
                        'resourceChild' => 'department|leader|address|comment|file|tax|item|bankexpensetransaction|expensecategory|client',
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
