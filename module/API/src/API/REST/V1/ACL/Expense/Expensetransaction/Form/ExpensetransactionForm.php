<?php

/**
 * ExpensetransactionForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransaction\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ExpensetransactionForm
 * @package API\REST\V1\ACL\Expense\Expensetransaction\Form
 */
class ExpensetransactionForm extends Form
{
    public function __construct(){
        parent::__construct('ExpensetransactionForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransaction',
            'options' => array(
                'label' => 'Id Expensetransaction'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpenseitem',
            'options' => array(
                'label' => 'Id Expenseitem'
            ),

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
                'label' => 'Expensetransaction Status'
            ),
            'attributes' => array(
                'suggestion' => 'suggestion' //set selected to 'suggestion'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_comment',
            'options' => array(
                'label' => 'Expensetransaction Comment'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_quantity',
            'options' => array(
                'label' => 'Expensetransaction Quantity'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_value',
            'options' => array(
                'label' => 'Expensetransaction Value'
            )

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransaction_date',
            'options' => array(
                'label' => 'Expensetransaction Date'
            )
        ));
    }
}