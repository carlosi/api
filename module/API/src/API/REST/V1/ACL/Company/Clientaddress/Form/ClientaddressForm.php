<?php


/**
 * ClientaddressForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientaddress\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ClientaddressForm
 * @package API\REST\V1\ACL\Company\Clientaddress\Form
 */
class ClientaddressForm extends Form{

    public function __construct(){

        parent::__construct('ClientaddressForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclientaddress',
            'options' => array(
                'label' => 'Id Dirección del cliente'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'Id Cliente'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_iso_codecountry',
            'options' => array(
                'label' => 'País'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_iso_codephone',
            'options' => array(
                'label' => 'Lada internacional'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_addressee',
            'options' => array(
                'label' => 'Dirección destinatario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_addressee_cellular',
            'options' => array(
                'label' => 'Número movil destinatario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_addressee_phone',
            'options' => array(
                'label' => 'Número de oficina destinatario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_address',
            'options' => array(
                'label' => 'Dirección'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_address2',
            'options' => array(
                'label' => 'Colonia'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_city',
            'options' => array(
                'label' => 'Ciudad'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_state',
            'options' => array(
                'label' => 'Estado'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientaddress_zipcode',
            'options' => array(
                'label' => 'Código postal'
            ),
        ));
    }
}
