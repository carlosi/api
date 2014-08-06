<?php

namespace Company\ACL\CompanyAddress\Form;

use Zend\Form\Form;

class CompanyAddressForm extends Form
{
    public function __construct(){
        parent::__construct('CompanyAddressForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompanyaddress',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_iso_codephone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_addressee',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_addressee_cellular',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_addressee_phone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_address',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_zipcode',
        ));
    }
}