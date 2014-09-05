<?php

/**
 * BankordertransactionForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Bankordertransaction\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class BankordertransactionForm
 * @package API\REST\V1\ACL\Sales\Bankordertransaction\Form
 */
class BankordertransactionForm extends Form
{
    public function __construct(){
        parent::__construct('BankordertransactionForm');

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
            'name' => 'bankordertransaction_paymentmethod',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('No identificado','transferencia electrónica','efectivo','Tarjeta de crédito','Tarjeta de débito','Cheque nomitativo','monedero electrónico'),
            ),
            'attributes' => array(
                'No identificado' => 'No identificado' //set selected to 'No identificado'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankordertransaction_last4of_account'
        ));
    }
}