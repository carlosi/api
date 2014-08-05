<?php

namespace Company\ACL\ClientComment\Form;

use Zend\Form\Form;

class ClientCommentForm extends Form
{
    public function __construct(){
        parent::__construct('ClientCommentForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclientcomment',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idclient',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientcomment_note',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientcomment_date',
        ));
    }
}