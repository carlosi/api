<?php

/**
 * CompanyaddressForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Companyaddress\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class CompanyaddressForm
 * @package API\REST\V1\ACL\Company\Companyaddress\Form
 */
class CompanyaddressForm extends Form
{
    public function __construct(){
        parent::__construct('CompanyaddressForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompanyaddress',
            'options' => array(
                'label' => 'Id Dirección Compañía'
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
            'name' => 'companyaddress_iso_codecountry',
            'options' => array(
                'label' => 'País'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_iso_codephone',
            'options' => array(
                'label' => 'Lada internacional'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_addressee',
            'options' => array(
                'label' => 'Compañía destinataria'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_addressee_cellular',
            'options' => array(
                'label' => 'Número movil de compañía destinataria'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_addressee_phone',
            'options' => array(
                'label' => 'Número de oficina de compañia destinataria'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_address',
            'options' => array(
                'label' => 'Dirección'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_address2',
            'options' => array(
                'label' => 'Colonia'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_city',
            'options' => array(
                'label' => 'Ciudad'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_state',
            'options' => array(
                'label' => 'Estado'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'companyaddress_zipcode',
            'options' => array(
                'label' => 'Código postal'
            ),
        ));
    }
}