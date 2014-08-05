<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Sales\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Sales\ACL\OrderComment\OrderCommentFormGET;


class OrderCommentController extends AbstractActionController
{
	public function indexAction(){

        $orderCommentFormGET = OrderCommentFormGET::init(3);
        var_dump($orderCommentFormGET);
    }
}