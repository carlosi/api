<?php

namespace REST\v1\Company\ACL\UserAcl\Form;

use Zend\Form\Form;

class UserAclForm extends Form
{
    public function __construct(){
        parent::__construct('UserAclForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduseracl',
            'options' => array(
                'label' => 'Id ACL Usuario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'Id Usuario'
            )
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
                'label' => 'Nombre del Módulo',
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
                'label' => 'Nivel de acceso',
            ),
            'attributes' => array(
                '1' => '1' //set selected to '1'
            )
        ));
    }
}