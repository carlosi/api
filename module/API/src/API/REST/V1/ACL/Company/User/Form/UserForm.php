<?php

/**
 * UserForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\User\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class UserForm
 * @package API\REST\V1\ACL\Company\User\Form
 */
class UserForm extends Form
{
    public function __construct()
    {
        parent::__construct('UserForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'Id Usuario',
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
            'name' => 'user_nickname',
            'options' => array(
                'label' => 'Nombre de usuario',
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'user_password',
            'options' => array(
                'label' => 'Contraseña'
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_type',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('human','system'),
                'label' => 'Tipo',
            ),

        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('pending','active','suspended','inactive'),
                'label' => 'Estado',
            ),
            'attributes' => array(
                'pending' => 'pending' //set selected to 'pending'
            )
        ));
    }
}
