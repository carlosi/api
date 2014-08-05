<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Contents\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Sales\ACL\ProductCategory\ProductCategoryFormGET;


class ProductCategoryController extends AbstractActionController
{
	public function indexAction(){

        $productCategoryFormGET = ProductCategoryFormGET::init(3);
        var_dump($productCategoryFormGET);
    }
}