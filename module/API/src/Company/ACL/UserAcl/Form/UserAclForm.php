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
            'type' => 'Select',
            'name' => 'module_name',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'basic' => 'basic',
                    'sales' => 'sales',
                    'company' => 'company',
                    'manufacture' => 'manufacture',
                    'contents' => 'contents',
                ),
            ),
            'attributes' => array(
                'basic' => 'basic' //set selected to 'basic'
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_accesslevel',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ),
            ),
            'attributes' => array(
                '1' => '1' //set selected to '1'
            )
        ));
    }
}