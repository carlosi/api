<?php

namespace REST\v1\Expense\ACL\ExpenseRecurrency\Form;

use Zend\Form\Form;

class ExpenseRecurrencyForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenseRecurrencyForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpenserecurrency',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpenseitem'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expenserecurrency_comment',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expenserecurrency_themequantity',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expenserecurrency_themevalue',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'expenserecurrency_cycle',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'weekly' => 'weekly',
                    'monthly' => 'monthly',
                    'annually' => 'annually',
                ),
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expenserecurrency_applyeach',
        ));
    }
}