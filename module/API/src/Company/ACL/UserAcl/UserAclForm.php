<?php

namespace Company\ACL\UserAcl;

use Zend\Form\Form;

class UserAclForm extends Form
{
    public function __construct(){
        parent::__construct('UserAclForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduseracl',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'iduser',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'module_name',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_accesslevel',
        ));
    }
}