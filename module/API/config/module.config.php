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
                    'route'    => '/v1/login[/]',
                    'defaults' => array(
                        'controller' => 'Login\V1\REST\Controller\LoginController',
                        'action'		=> 'login',
                    ),
                ),
            ),
            // Module Routes Company
            'bankaccount' => array(
                'type' => 'segment',
                'options' => array(
<<<<<<< HEAD
                    'route'    => '/v1/bankaccount[/:id][/:token][/]',
=======
                    'route'    => '/v[:version]/user[/:id][/:token][/]',
>>>>>>> 6c98efc386aca8916eeea7b8543dfea935bb1511
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\BankAccountController',
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
                    'route'    => '/v1/branch[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\BranchController',
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
                    'route'    => '/v1/branchuser[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\BranchUserController',
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
                    'route'    => '/v1/client[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\ClientController',
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
                    'route'    => '/v1/clientaddress[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\ClientAddressController',
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
                    'route'    => '/v1/clientcomment[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\ClientCommentController',
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
<<<<<<< HEAD
                    'route'    => '/v1/clientfile[/:id][/:token][/]',
=======
                    'route'    => '/v1/login[/]',
>>>>>>> 6c98efc386aca8916eeea7b8543dfea935bb1511
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\ClientFileController',
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
                    'route'    => '/v1/companyaddress[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\CompanyAddressController',
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
                    'route'    => '/v1/company[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\CompanyController',
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
                    'route'    => '/v1/useracl[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\UserAclController',
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
                    'route'    => '/v1/user[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Company\V1\REST\Controller\UserController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
            // Module Routes Expense
            'bankexpensetransaction' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v1/bankexpensetransaction[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Expense\V1\REST\Controller\BankExpenseTransactionController',
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
                    'route'    => '/v1/expenserecurrency[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'Expense\V1\REST\Controller\ExpenseRecurrencyController',
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
                    'route'    => '/v1/clienttax[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'SATMexico\V1\REST\Controller\ClientTaxController',
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
                    'route'    => '/v1/mxtaxdocument[/:id][/:token][/]',
                    'defaults' => array(
                        'controller' => 'SATMexico\V1\REST\Controller\MxTaxDocumentController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'limit' => '[0-9]+',
                        'order' => 'asc|desc',
                    ),
                ),
            ),
        	// Module Routes Documentation
            'documentation' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/v1/documentation[/]',
                    'defaults' => array(
                        'controller' => 'Documentation\V1\REST\Controller\IndexController',
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

            'Login\V1\REST\Controller\LoginController'                                  => 'Login\V1\REST\Controller\LoginController',

            'Company\V1\REST\Controller\BankAccountController'                  => 'Company\V1\REST\Controller\BankAccountController',
            'Company\V1\REST\Controller\BranchController'                       => 'Company\V1\REST\Controller\BranchController',
            'Company\V1\REST\Controller\BranchUserController'                   => 'Company\V1\REST\Controller\BranchUserController',
            'Company\V1\REST\Controller\ClientController'                       => 'Company\V1\REST\Controller\ClientController',
            'Company\V1\REST\Controller\ClientAddressController'                => 'Company\V1\REST\Controller\ClientAddressController',
            'Company\V1\REST\Controller\ClientCommentController'                => 'Company\V1\REST\Controller\ClientCommentController',
            'Company\V1\REST\Controller\ClientFileController'                   => 'Company\V1\REST\Controller\ClientFileController',
            'Company\V1\REST\Controller\CompanyController'                      => 'Company\V1\REST\Controller\CompanyController',
            'Company\V1\REST\Controller\CompanyAddressController'               => 'Company\V1\REST\Controller\CompanyAddressController',
            'Company\V1\REST\Controller\UserAclController'                      => 'Company\V1\REST\Controller\UserAclController',
            'Company\V1\REST\Controller\UserController'                         => 'Company\V1\REST\Controller\UserController',

            'Contents\V1\REST\Controller\ProductController'                     => 'Contents\V1\REST\Controller\ProductController',

            'Documentation\V1\REST\Controller\IndexController'		            => 'Documentation\V1\REST\Controller\IndexController',
            'Documentation\V1\REST\Controller\ModulesController'	            => 'Documentation\V1\REST\Controller\ModulesController',

            'Expense\V1\REST\Controller\BankExpenseTransactionController' 	    => 'Expense\V1\REST\Controller\BankExpenseTransactionController',
            'Expense\V1\REST\Controller\ExpenseRecurrencyController' 	        => 'Expense\V1\REST\Controller\ExpenseRecurrencyController',

            'SATMexico\V1\REST\Controller\ClientTaxController'                  => 'SATMexico\V1\REST\Controller\ClientTaxController',
            'SATMexico\V1\REST\Controller\MxTaxDocumentController'              => 'SATMexico\V1\REST\Controller\MxTaxDocumentController',

            'Shared\V1\REST\Controller\AllowedPropertiesController'             => 'Shared\V1\REST\Controller\AllowedPropertiesController',
            
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
