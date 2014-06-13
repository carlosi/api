<?php

namespace Company\ACL\BankOrderTransaction;

use Zend\Form\Form;

class BankOrderTransactionForm extends Form
{
    public function __construct(){
        parent::__construct('BankOrderTransactionForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankordertransaction'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankaccount'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankordertransaction_amount'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankordertransaction_date'
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'bankordertransaction_paymentmethod'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankordertransaction_last4of_account'
        ));
    }
}