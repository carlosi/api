<?php

namespace Sales\V1\REST\ACL\BankOrderTransaction\Form;

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