<?php

namespace Sales\V1\REST\ACL\OrderShipping\Form;

use Zend\Form\Form;

class OrderShippingForm extends Form
{
    public function __construct(){
        parent::__construct('OrderShippingForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idordershipping'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping'
        ));
    }
}