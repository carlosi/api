<?php

namespace Company\ACL\BankAccount;

use Zend\Form\Form;

class BankAccountForm extends Form
{
    public function __construct()
    {
        parent::__construct('BankAccountForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankaccount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankaccount_name',
        ));
    }
}