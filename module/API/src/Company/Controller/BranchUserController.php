<?php

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Company\ACL\BranchUser\BranchUserFormGET;

class BranchUserController extends AbstractActionController
{
    public function indexAction(){
        $branchUserFormGET = BranchUserFormGET::init(4);
        var_dump($branchUserFormGET);
    }
}