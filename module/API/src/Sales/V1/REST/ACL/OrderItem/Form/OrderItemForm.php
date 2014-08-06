<?php

namespace Sales\V1\REST\ACL\OrderItem\Form;

use Zend\Form\Form;

class OrderItemForm extends Form
{
    public function __construct(){
        parent::__construct('OrderItemForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderitem'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproduct'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderitem_note'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'quantity'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'value'
        ));
    }
}