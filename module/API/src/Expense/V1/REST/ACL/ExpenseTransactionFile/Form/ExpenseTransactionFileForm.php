<?php

namespace Expense\V1\REST\ACL\ExpenseTransactionFile\Form;

use Zend\Form\Form;

class ExpenseTransactionFileForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenseTransactionFileForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransactionfile',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransaction'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransactionfile_url',
        ));
    }
}