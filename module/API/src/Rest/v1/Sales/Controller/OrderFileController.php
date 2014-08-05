<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Sales\Controller;

use Sales\ACL\OrderFile\OrderFileFormGET;
use Zend\Mvc\Controller\AbstractActionController;



class OrderFileController extends AbstractActionController
{
	public function indexAction(){

        $orderFileFormGET = OrderFileFormGET::init(3);
        var_dump($orderFileFormGET);
    }
}