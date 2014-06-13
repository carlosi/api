<?php

namespace Sales\ACL\OrderFile;

use Zend\Form\Form;

class OrderFileForm extends Form
{
    public function __construct(){
        parent::__construct('OrderFileForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderfile',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idorder',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderfile_url',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderfile_note',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderfile_uploaddate',
        ));
    }
}
