<?php

namespace Expense\V1\REST\ACL\BankExpenseTransaction\Form;

use Zend\Form\Form;

class BankExpenseTransactionForm extends Form
{
    public function __construct(){
        parent::__construct('BankExpenseTransactionForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankexpensetransaction',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankaccount'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransaction',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankexpensetransaction_amount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankexpensetransaction_date',
        ));
    }
}