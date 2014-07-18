<?php

namespace Company\ACL\Company\Form;

use Zend\Form\Form;

class CompanyForm extends Form
{
    public function __construct(){
        parent::__construct('CompanyForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'ID',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_name',
            'options' => array(
                'label' => 'Nombre',
            ),
            
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_timezone',
            'options' => array(
                'label' => 'Zona Horaria',
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'company_iso_codecountry',
            'options' => array(
                'label' => 'Codigo de pais',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_address',
            'options' => array(
                'label' => 'Direccion',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_address2',
            'options' => array(
                'label' => 'Direccion 2',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_city',
            'options' => array(
                'label' => 'Ciudad',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_state',
            'options' => array(
                'label' => 'Estado',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_zipcode',
            'options' => array(
                'label' => 'Codigo Postal',
            ),
        ));
    }
}