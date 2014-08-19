 <?php

 /**
  * module.config.php
  * BuyBuy
  *
  * Created by Carlos Esparza on 12/08/2014.
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
            // Module Routes Company
            'bankaccount' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/bankaccount[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'client' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/client[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'branch' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/branch[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'branchuser' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/branchuser[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'clientaddress' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/clientaddress[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'clientcomment' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/clientcomment[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'clientfile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/clientfile[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'companyaddress' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/companyaddress[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/company[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'useracl' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/useracl[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'user' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/user[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            // Module Routes Expense
            'bankexpensetransaction' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/bankexpensetransaction[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'expenserecurrency' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/expenserecurrency[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'expensetransactionfile' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/expensetransactionfile[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            // Module Routes Sales
            'order' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/order[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            // Module Routes SATMexico
            'clienttax' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v[:version]/clienttax[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            'mxtaxdocument' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/mxtaxdocument[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
                    ),
                ),
            ),
            // Module Routes Documentation
            'documentation' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/documentation[/]',
                    'defaults' => array(
                        'controller' => 'API\REST\V1\Controller\ResourceController',
                        'action'		=> 'index',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'version' => '1',
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

            'API\REST\V1\Login\Controller\LoginController'    => 'API\REST\V1\Login\Controller\LoginController',
            'API\REST\V1\Controller\ResourceController'       => 'API\REST\V1\Controller\ResourceController',

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
