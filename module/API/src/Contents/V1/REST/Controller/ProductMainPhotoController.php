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
use Contents\ACL\ProductMainPhoto\ProductMainPhotoFormGET;

class ProductMainPhotoController extends AbstractActionController
{
	public function indexAction(){
        $productMainPhotoFormGET = ProductMainPhotoFormGET::init(3);
        var_dump($productMainPhotoFormGET);
    }
}