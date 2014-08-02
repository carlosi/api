<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Manufacture\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Manufacture\ACL\ProductionTeam\ProductionTeamFormGET;

class ProductionTeamController extends AbstractActionController
{
	public function indexAction(){

        $productionTeamFormGET = ProductionTeamFormGET::init(3);
        var_dump($productionTeamFormGET);
    }
}