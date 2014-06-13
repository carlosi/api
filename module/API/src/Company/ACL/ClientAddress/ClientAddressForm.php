<?php

namespace Company\ACL\ClientAddress;

use Zend\Form\Form;

class ClientAddressForm extends Form{

    public function __construct(){

        parent::__construct('ClientAddressForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclientaddress',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idclient',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'clientaddress_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'clientaddress_iso_codephone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_addressee',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_addressee_cellular',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_addressee_phone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_address',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_zipcode',
        ));
    }
}
