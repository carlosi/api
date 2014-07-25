<?php

namespace Company\ACL\BranchUser\Form;

use Zend\Form\Form;

class BranchUserForm extends Form
{
    public function __construct(){
        parent::__construct('BranchUserForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch_user',

        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idbranch',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'iduser',
        ));

    }
}
