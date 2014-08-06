<?php

namespace Sales\ACL\Order\Form;

use Zend\Form\Form;

class OrderForm extends Form
{
    public function __construct(){
        parent::__construct('OrderForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'created_at'
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('COMPLETE','INCOMPLETE'),
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_payment',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('PAID','UNPAID'),
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_paymentmode',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('UNIQUE','PARTIAL'),
            ),
            'attributes' => array(
                'UNIQUE' => 'UNIQUE' //set selected to 'UNIQUE'
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_delivery',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('LOCALMODE','SHIPMODE','TRANSIT','FINISHED','TRANSITTOBRANCH'),
            ),
        ));
    }
}