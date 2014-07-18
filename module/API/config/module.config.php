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
            // Propel Test
        	'client' => array(
        				'type' => 'segment',
						'options' => array(
        						'route'    => '/client[/:id][/:token]',
        						'defaults' => array(
        								'controller' => 'Company\Controller\ClientController',
										'action'		=> 'index',
								),
        				),
        	),
            'allowedProperties' => array(
        				'type' => 'segment',
						'options' => array(
        						'route'    => '/allow/:resource[/:token][/]',
        						'defaults' => array(
        								'controller' => 'Shared\Controller\AllowedPropertiesController',
								),
        				),
        	),
            'user' => array(
        				'type' => 'segment',
						'options' => array(
        						'route'    => '/user[/:id][/:token][/]',
        						'defaults' => array(
        								'controller' => 'Company\Controller\UserController',
								),
                                                    'constraints' => array(
                                                        'id' => '[0-9]+',
                                                        'limit' => '[0-9]+',
                                                        'order' => 'asc|desc',
                                                    ),
        				),
        	),
            //$limit=50, array $conditions=null, $orderBy=null, $order='DESC', $column_like=null, $word=null, $exactly=false
            'branch' => array(
        				'type' => 'segment',
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
            'login' => array(
        				'type' => 'segment',
						'options' => array(
        						'route'    => '/login',
        						'defaults' => array(
        								'controller' => 'Login\Controller\LoginController',
                                                                        'action' => 'login',
								),
        				),
        	),

            // End Propel Test

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
        	
       	  //Inicio de rutas del sub-modulo Company
       	  'company-login' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/company/login',
        			'defaults' => array(
        				'controller' => 'Company\Controller\LoginController',
        				'action'	 => 'index',
        			),
        		),
	       	),
	       	'company-company' => array(
	       		'type' => 'segment',
	       		'options' => array(
   					'route'    => '/v1/json/company/company[.:action][/token][/:token][/]',
	       			'defaults' => array(
	       				'controller' => 'Company\Controller\CompanyController',
	       				'action'	 => 'index',
	       			),
	       		),
	       	),
	       	'company-bank-account' => array(
	       		'type' => 'segment',
	       		'options' => array(
	       			'route'    => '/v1/json/company/bank-account[.:action][/token][/:token][/]',
	       			'defaults' => array(
	       				'controller'	=> 'Company\Controller\BankAccountController',
	       				'action'		=> 'list',
	       				'token'			=>	null,
	       			),
	       		),
	       	),
        	'company-branch' => array(
      			'type' => 'segment',
      			'options' => array(
   					'route'    => '/v1/json/company/branch[.:action][/token][/:token][/]',
   					'defaults' => array(
  						'controller'	=> 'Company\Controller\BranchCompanyController',
  						'action'		=> 'list',
  						'token'			=>	null,
    				),
      			),
        	),
        	'company-client' => array(
       			'type' => 'segment',
       			'options' => array(
   					'route'    => '/v1/json/company/client[.:action][/token][/:token][/]',
   					'defaults' => array(
						'controller' => 'Company\Controller\ClientController',
						'action'		=> 'list',
						'token'			=>	null,
   					),
       			),
        	),
        	'company-client-tax' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/company/client-tax[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Company\Controller\ClientTaxController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	'company-client-address' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/company/client-address[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' => 'Company\Controller\ClientAddressController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'company-client-comment' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/company/client-comment[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Company\Controller\ClientCommentController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	'company-client-file' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/company/client-file[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' => 'Company\Controller\ClientFileController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'company-mx-tax-document' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/company/mx-tax-document[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' 	=> 'Company\Controller\MxTaxDocumentController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'company-mx-tax-info' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/company/mx-tax-info[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' 	=> 'Company\Controller\MxTaxInfoController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	//Fin de rutas del sub-modulo Company

        	//Inicio de rutas del sub-modulo Contents
        	'contents-product' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/contents/product[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Contents\Controller\ProductController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	'contents-product-main' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/contents/product-main[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Contents\Controller\ProductMainController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	'contents-product-main-photo' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/contents/product-main-photo[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Contents\Controller\ProductMainPhotoController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	//Fin de rutas del sub-modulo Contents

            //Inicio de rutas del sub-módulo Manufacture
            'manufacture-production-team' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v1/json/manufacture/production-team[.:action][/token][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Manufacture\Controller\ProductionTeamController',
                        'action'		=> 'list',
                        'token'			=>	null,
                    ),
                ),
            ),
            'manufacture-production-order-item' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v1/json/manufacture/production-order-item[.:action][/token][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Manufacture\Controller\ProductionOrderItemController',
                        'action'		=> 'list',
                        'token'			=>	null,
                    ),
                ),
            ),
            //Fin de rutas del sub-módulo Manufacture

            //Inicio de rutas del sub-modulo Sales
        	'sales-order' => array(
       			'type' => 'segment',
       			'options' => array(
   					'route'    => '/v1/json/sales/order[.:action][/token][/:token][/]',
   					'defaults' => array(
						'controller' => 'Sales\Controller\OrderController',
						'action'		=> 'list',
						'token'			=>	null,
   					),
       			),
        	),
        	'sales-order-file' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/sales/order-file[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Sales\Controller\OrderFileController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	'sales-order-comment' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/sales/order-comment[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Sales\Controller\OrderCommentController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
        	'sales-order-item' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/sales/order-item[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' => 'Sales\Controller\OrderItemController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'sales-order-shipping' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/sales/order-shipping[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' => 'Sales\Controller\OrderShippingController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'sales-product-category' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/sales/product-category[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' => 'Sales\Controller\ProductCategoryController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'sales-product-category-property' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route'    => '/v1/json/sales/product-category-property[.:action][/token][/:token][/]',
        			'defaults' => array(
        				'controller' => 'Sales\Controller\ProductCategoryPropertyController',
        				'action'		=> 'list',
        				'token'			=>	null,
        			),
        		),
        	),
        	'sales-product-category-property-option' => array(
        			'type' => 'segment',
        			'options' => array(
        					'route'    => '/v1/json/sales/product-category-property-option[.:action][/token][/:token][/]',
        					'defaults' => array(
        							'controller' => 'Sales\Controller\ProductCategoryPropertyOptionController',
        							'action'		=> 'list',
        							'token'			=>	null,
        					),
        			),
        	),
            //Fin de rutas del sub-m���dulo Sales

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
