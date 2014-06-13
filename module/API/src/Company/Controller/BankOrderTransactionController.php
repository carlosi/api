<?php

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Company\ACL\BankOrderTransaction\BankOrderTransactionFormGET;

class BankOrderTransactionController extends AbstractActionController
{
    public function indexAction(){
        $bankOrderTransactionFormGET = BankOrderTransactionFormGET::init(3);
        var_dump($bankOrderTransactionFormGET);
    }
}