<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Company\ACL\Company\CompanyFormGET;


class CompanyController extends AbstractActionController
{
	public function indexAction(){
        $companyFormGET = CompanyFormGET::init(3);
        var_dump($companyFormGET);
    }
}