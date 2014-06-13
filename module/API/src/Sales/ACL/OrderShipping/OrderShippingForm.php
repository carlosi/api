<?php

namespace Sales\ACL\OrderShipping;

use Zend\Form\Form;

class OrderShippingForm extends Form
{

    public function __construct(){
        parent::__construct('OrderShippingForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping',
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'idorder',
        ));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_address',
        ));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_tracking',
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'transport_company',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_date',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_datecompromise',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_daterealdelivery',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'shipping_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'shipping_iso_codephone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_addressee',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_addressee_cellular',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_addressee_phone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_address',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_zipcode',
        ));

    }
}