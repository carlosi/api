<?php

namespace Company\ACL\DepartamentMember\Form;

use Zend\Form\Form;

class DepartamentMemberForm extends Form
{
    public function __construct(){
        parent::__construct('DepartamentMemberForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartamentmember',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartament'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
        ));
    }
}