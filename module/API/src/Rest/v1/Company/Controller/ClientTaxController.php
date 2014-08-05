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
use Company\ACL\ClientTax\ClientTaxFormGET;


class ClientTaxController extends AbstractActionController
{
	public function indexAction(){
        $clientTaxFormGET = ClientTaxFormGET::init(4);
        var_dump($clientTaxFormGET);
    }
}