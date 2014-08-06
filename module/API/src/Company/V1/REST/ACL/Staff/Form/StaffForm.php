<?php

namespace Company\V1\REST\ACL\Staff\Form;

use Zend\Form\Form;

class StaffForm extends Form
{
    public function __construct(){
        parent::__construct('StaffForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idstaff',
            'options' => array(
                'label' => 'Id Personal'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'Id Usuario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_name',
            'options' => array(
                'label' => 'Personal'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_email',
            'options' => array(
                'label' => 'Email'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_email2',
            'options' => array(
                'label' => 'Email secundario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_phone',
            'options' => array(
                'label' => 'Teléfono local'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_cellular',
            'options' => array(
                'label' => 'Teléfono movil'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_language',
            'options' => array(
                'label' => 'Idioma'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_iso_codecountry',
            'options' => array(
                'label' => 'País'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'staff_iso_codephone',
            'options' => array(
                'label' => 'Lada internacional'
            ),
        ));
    }
}