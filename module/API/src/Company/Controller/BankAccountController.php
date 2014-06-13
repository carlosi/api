<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Company\ACL\BankAccount\BankAccountFormGET;
use Bankaccount;


class BankAccountController extends AbstractActionController
{
    public function indexAction(){
        $bankAccountFormGET = BankAccountFormGET::init(3);
        var_dump($bankAccountFormGET);

    /*
        $bankAccount = new Bankaccount();
        $bankAccount->setIdcompany(1);
        $bankAccount->setBankaccountName('Bancomer');
        $bankAccount->save();
        var_dump($bankAccount);
    */

    }
}
    							