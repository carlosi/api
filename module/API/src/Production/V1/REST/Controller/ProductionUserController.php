<?php

namespace Manufacture\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Manufacture\ACL\ProductionUser\ProductionUserFormGET;

class ProductionUserController extends AbstractActionController
{
    public function indexAction(){

        $productionUserFormGET = ProductionUserFormGET::init(3);
        var_dump($productionUserFormGET);
    }
}