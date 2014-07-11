<?php

namespace Company\ACL\UserAcl\Form;

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
            'type' => 'Hidden',
            'name' => 'iduser',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'module_name',
        ));
        $this->add(array(
            'type' => 'Hiddeb',
            'name' => 'user_accesslevel',
        ));
    }
}