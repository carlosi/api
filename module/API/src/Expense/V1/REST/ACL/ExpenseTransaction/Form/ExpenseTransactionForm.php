<?php

namespace Expense\V1\REST\ACL\ExpenseTransaction\Form;

use Zend\Form\Form;

class ExpenseTransactionForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenseTransactionForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransaction',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpenseitem'
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'expensetransaction_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'suggestion' => 'suggestion',
                    'pending' => 'pending',
                    'completed' => 'completed',
                ),
            ),
            'attributes' => array(
                'suggestion' => 'suggestion' //set selected to 'suggestion'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_comment',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_quantity',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_value',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_date',
        ));
    }
}