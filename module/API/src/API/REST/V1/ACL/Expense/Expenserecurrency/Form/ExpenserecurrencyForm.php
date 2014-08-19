<?php

/**
 * ExpenserecurrencyForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expenserecurrency\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ExpenserecurrencyForm
 * @package API\REST\V1\ACL\Expense\Expenserecurrency\Form
 */
class ExpenserecurrencyForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenserecurrencyForm');

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