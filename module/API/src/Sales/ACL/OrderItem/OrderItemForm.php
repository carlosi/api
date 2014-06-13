<?php

namespace Sales\ACL\OrderItem;

use Zend\Form\Form;

class OrderItemForm extends Form
{
    public function __construct(){
        parent::__construct('OrderItemForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderitem',
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'idorder',
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'idproduct',
        ));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'quantity',

        ));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'value',
        ));
    }
}
