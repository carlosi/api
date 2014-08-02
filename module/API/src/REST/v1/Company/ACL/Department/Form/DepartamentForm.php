<?php

namespace REST\v1\Company\ACL\Departament\Form;

use Zend\Form\Form;

class DepartamentForm extends Form
{
    public function __construct(){
        parent::__construct('DepartamentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
            'options' => array(
                'label' => 'Id Departamento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'Id Compañía'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'departament_name',
            'options' => array(
                'label' => 'Departamento'
            ),
        ));
    }
}