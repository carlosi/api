<?php

namespace Sales\V1\REST\ACL\OrderComment\Form;

use Zend\Form\Form;

class OrderCommentForm extends Form
{
    public function __construct(){
        parent::__construct('OrderCommentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idordercomment'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'ordercomment_note'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'ordercomment_date'
        ));
    }
}