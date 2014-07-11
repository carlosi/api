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
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_name'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_timezone',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'company_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_address',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_zipcode',
        ));
    }
}