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
            //Login
            'login' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/login[/]',
                    'defaults' => array(
                        'controller' => 'Login\Controller\LoginController',
                        'action'		=> 'login',
                    ),
                ),
            ),
            // Module Routes Company
            'bankaccount' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/bankaccount[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\BankAccountController',
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
            'client' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/client[/:id][/:token][/]',
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
            'clientcomment' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/clientcomment[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\ClientCommentController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'clientfile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/clientfile[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\ClientFileController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/company[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\CompanyController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'companyaddress' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/companyaddress[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\CompanyAddressController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'mxtaxdocument' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/mxtaxdocument[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'SATMexico\Controller\MxTaxDocumentController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
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
            // Module Routes SATMexico
            'clienttax' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/clienttax[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'SATMexico\Controller\ClientTaxController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            'expenserecurrency' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/expenserecurrency[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Expense\Controller\ExpenseRecurrencyController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
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
            // Expense
            'bankexpensetransaction' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/bankexpensetransaction[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Expense\Controller\BankExpenseTransactionController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
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

            'Login\Controller\LoginController'              => 'Login\Controller\LoginController',

            'Company\Controller\BankAccountController'      => 'Company\Controller\BankAccountController',
            'Company\Controller\BranchController'           => 'Company\Controller\BranchController',
            'Company\Controller\BranchUserController'       => 'Company\Controller\BranchUserController',
            'Company\Controller\ClientController'           => 'Company\Controller\ClientController',
            'Company\Controller\ClientAddressController'    => 'Company\Controller\ClientAddressController',
            'Company\Controller\ClientCommentController'    => 'Company\Controller\ClientCommentController',
            'Company\Controller\ClientFileController'       => 'Company\Controller\ClientFileController',
            'Company\Controller\CompanyController'          => 'Company\Controller\CompanyController',
            'Company\Controller\CompanyAddressController'   => 'Company\Controller\CompanyAddressController',
            'Company\Controller\UserController'             => 'Company\Controller\UserController',

            'Contents\Controller\ProductController'         => 'Contents\Controller\ProductController',

            'Documentation\Controller\IndexController'		=> 'Documentation\Controller\IndexController',
            'Documentation\Controller\ModulesController'	=> 'Documentation\Controller\ModulesController',

            'Expense\Controller\BankExpenseTransactionController' 	=> 'Expense\Controller\BankExpenseTransactionController',
            'Expense\Controller\ExpenseRecurrencyController' 	=> 'Expense\Controller\ExpenseRecurrencyController',

            'Sales\Controller\OrderController' 			        => 'Sales\Controller\OrderController',
            'Sales\Controller\ProductCategoryPropertyOptionController' 	=> 'Sales\Controller\ProductCategoryPropertyOptionController',

            'SATMexico\Controller\ClientTaxController'     => 'SATMexico\Controller\ClientTaxController',
            'SATMexico\Controller\MxTaxDocumentController' => 'SATMexico\Controller\MxTaxDocumentController',

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
