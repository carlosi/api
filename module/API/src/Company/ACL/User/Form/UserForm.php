<?php
namespace Company\ACL\User\Form;

use Zend\Form\Form;


class UserForm extends Form
{
    public function __construct()
    {
        parent::__construct('UserForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'user_nickname',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'user_password',

        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_type',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('human','system'),
            ),
            'attributes' => array(
                'human' => 'human' // set selected to 'human'
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('pending','active','suspended','inactive'),
            ),
            'attributes' => array(
                'pending' => 'pending' //set selected to 'pending'
            )
        ));
    }
}
