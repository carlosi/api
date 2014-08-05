<?php

namespace Sales\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Sales\ACL\BankOrderTransaction\Form\BankOrderTransactionFormGET;

class BankOrderTransactionController extends AbstractActionController
{
    public function indexAction(){
        $bankOrderTransactionFormGET = BankOrderTransactionFormGET::init(3);
        var_dump($bankOrderTransactionFormGET);
    }
}