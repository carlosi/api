<?php
namespace Shipping\V1\REST\ACL\Shipping\Form;

use Zend\Form\Form;

class ShippingForm extends Form
{
    public function __construct()
    {
        parent::__construct('ShippingForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_tracking',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'transport_company',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'FEDEX' => 'FEDEX',
                    'ESTAFETA' => 'ESTAFETA',
                    'DHL' => 'DHL',
                    'UPS' => 'UPS',
                    'PRIVATE' => 'PRIVATE',
                    'OTHER' => 'OTHER',
                    'EMS' => 'EMS',
                    'CORREOS DE MÉXICO' => 'CORREOS DE MÉXICO',
                    'SEPOMEX' => 'SEPOMEX'
                ),
            ),
            'attributes' => array(
                'FEDEX' => 'FEDEX' //set selected to 'MX'
            )
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
            'name' => 'shipping_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'pending' => 'pending',
                    'transit' => 'transit',
                    'complete' => 'complete'
                ),
            ),
            'attributes' => array(
                'pending' => 'pending' //set selected to 'MX'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_iso_codephone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_addressee_cellular',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_addressee_phone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'sender_zipcode',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_iso_codephone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_addressee_cellular',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_addressee_phone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'addressee_zipcode',
        ));
    }
}
