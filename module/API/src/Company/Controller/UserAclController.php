<?php

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Company\ACL\UserAcl\UserAclFormGET;

class UserAclController extends AbstractActionController
{
    public function indexAction(){

        $userAclFormGET = UserAclFormGET::init(4);
        var_dump($userAclFormGET);
    }
}