<?php

namespace Company\V1\REST\ACL\DepartamentMember\Form;

use Zend\Form\Form;

class DepartamentMemberForm extends Form
{
    public function __construct(){
        parent::__construct('DepartamentMemberForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartamentmember',
            'options' => array(
                'label' => 'Id Miembro de Departamento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartament',
            'options' => array(
                'label' => 'Id Departamento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'Id Usuario'
            ),
        ));
    }
}