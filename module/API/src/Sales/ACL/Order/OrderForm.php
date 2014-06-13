<?php

namespace Sales\ACL\Order;

use Zend\Form\Form;

class OrderForm extends Form
{
    public function __construct(){
        parent::__construct('OrderForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder',

        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idclient',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idbranch',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'created_at',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_status',
            'options' => array(
                'required' => true,
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_payment',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_paymentmode',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_delivery',
        ));
    }
}
