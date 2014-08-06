<?php

namespace Company\V1\REST\ACL\BranchUser\Form;

use Zend\Form\Form;

class BranchUserForm extends Form
{
    public function __construct(){
        parent::__construct('BranchUserForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch_user',
            'options' => array(
                'label' => 'Id Usuario de Sucursal'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch',
            'options' => array(
                'label' => 'Id Sucursal'
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
