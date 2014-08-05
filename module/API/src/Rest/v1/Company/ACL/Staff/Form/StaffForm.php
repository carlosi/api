<?php

namespace Company\ACL\Staff\Form;

use Zend\Form\Form;

class StaffForm extends Form
{
    public function __construct(){
        parent::__construct('StaffForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idstaff',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_email',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_email2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_phone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_cellular',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_language',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_iso_codephone',
        ));
    }
}