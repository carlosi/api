<?php

namespace Sales\ACL\OrderRecord\Form;

use Zend\Form\Form;

class OrderRecordForm extends Form
{
    public function __construct(){
        parent::__construct('OrderRecordForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderrecord'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderrecord_date'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderrecord_event'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderrecord_note'
        ));
    }
}