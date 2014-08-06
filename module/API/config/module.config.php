 <?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v[:version]/user[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\UserController',
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
                    'route'    => '/v1/client[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\ClientController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'branch' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/branch[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\BranchController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'useracl' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/useracl[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\UserAclController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'branchuser' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/branchuser[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\BranchUserController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),

            'clientaddress' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/clientaddress[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\ClientAddressController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/v1/login[/]',
                    'defaults' => array(
                        'controller' => 'Login\Controller\LoginController',
                        'action' => 'login',
                    ),
                ),
            ),

        	// Documentation
            'documentation' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/documentation[/]',
                    'defaults' => array(
                        'controller' => 'Documentation\Controller\IndexController',
                        'action'		=> 'index',
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
            //Propel Test
            'Test\Controller\IndexController' => 'Test\Controller\IndexController',

            'Company\Controller\UserController'                 => 'Company\Controller\UserController',
            'Company\Controller\UserAclController'              => 'Company\Controller\UserAclController',
            'Company\Controller\LoginController'			    => 'Company\Controller\LoginController',
            'Company\Controller\CompanyController' 			    => 'Company\Controller\CompanyController',
            'Company\Controller\BankAccountController' 	        => 'Company\Controller\BankAccountController',
            'Company\Controller\BankOrderTransactionController' => 'Company\Controller\BankOrderTransactionController',
            'Company\Controller\BranchController' 			    => 'Company\Controller\BranchController',
            'Company\Controller\BranchUserController'           => 'Company\Controller\BranchUserController',
            'Company\Controller\ClientController' 			    => 'Company\Controller\ClientController',
            'Company\Controller\ClientTaxController'   	        => 'Company\Controller\ClientTaxController',
            'Company\Controller\ClientCommentController' 		=> 'Company\Controller\ClientCommentController',
            'Company\Controller\ClientAddressController' 		=> 'Company\Controller\ClientAddressController',
            'Company\Controller\ClientFileController' 			=> 'Company\Controller\ClientFileController',
            'Company\Controller\MxTaxDocumentController' 		=> 'Company\Controller\MxTaxDocumentController',
            'Company\Controller\MxTaxInfoController' 			=> 'Company\Controller\MxTaxInfoController',
            'Company\Controller\TestController' 			    => 'Company\Controller\TestController',

            'Contents\Controller\ProductController' 			=> 'Contents\Controller\ProductController',
            'Contents\Controller\ProductMainController' 		=> 'Contents\Controller\ProductMainController',
            'Contents\Controller\ProductMainPhotoController'    => 'Contents\Controller\ProductMainPhotoController',
            
        	'Sales\Controller\OrderController' 			        => 'Sales\Controller\OrderController',
        	'Sales\Controller\OrderFileController' 			    => 'Sales\Controller\OrderFileController',
        	'Sales\Controller\OrderCommentController' 		    => 'Sales\Controller\OrderCommentController',
        	'Sales\Controller\OrderItemController' 			    => 'Sales\Controller\OrderItemController',
        	'Sales\Controller\OrderShippingController' 		    => 'Sales\Controller\OrderShippingController',
            'Sales\Controller\ProductCategoryController' 		=> 'Sales\Controller\ProductCategoryController',
            'Sales\Controller\ProductCategoryPropertyController' 	=> 'Sales\Controller\ProductCategoryPropertyController',
            'Sales\Controller\ProductCategoryPropertyOptionController' 	=> 'Sales\Controller\ProductCategoryPropertyOptionController',

            'Manufacture\Controller\ProductionUserController' 	        => 'Manufacture\Controller\ProductionUserController',
            'Manufacture\Controller\ProductionTeamController' 	        => 'Manufacture\Controller\ProductionTeamController',
            'Manufacture\Controller\ProductionOrderItemController' 	    => 'Manufacture\Controller\ProductionOrderItemController',

            'Documentation\Controller\IndexController'		=> 'Documentation\Controller\IndexController',
            'Documentation\Controller\ModulesController'	=> 'Documentation\Controller\ModulesController',
            
            'Login\Controller\LoginController' => 'Login\Controller\LoginController',
            'Shared\Controller\AllowedPropertiesController' => 'Shared\Controller\AllowedPropertiesController',
            
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
