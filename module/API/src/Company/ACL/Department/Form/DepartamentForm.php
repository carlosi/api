<?php

namespace Company\ACL\Departament\Form;

use Zend\Form\Form;

class DepartamentForm extends Form
{
    public function __construct(){
        parent::__construct('DepartamentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'departament_name',
        ));
    }
}