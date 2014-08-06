<?php

namespace SATMexico\V1\REST\ACL\ClientTax\Form;

use Zend\Form\Form;

class ClientTaxForm extends Form
{
    public function __construct(){
        parent::__construct('ClientTaxForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclienttax',
            'options' => array(
                'label' => 'Id fisal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'Id cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_iso_codecountry',
            'options' => array(
                'label' => 'País'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_iso_codephone',
            'options' => array(
                'label' => 'Lada internacional'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_name',
            'options' => array(
                'label' => 'Nombre fiscal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_taxesid',
            'options' => array(
                'label' => 'Id fiscal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_address',
            'options' => array(
                'label' => 'Dirección fiscal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_address2',
            'options' => array(
                'label' => 'Colonia fiscal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_city',
            'options' => array(
                'label' => 'Ciudad fiscal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_state',
            'options' => array(
                'label' => 'Estado fiscal del cliente'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_zipcode',
            'options' => array(
                'label' => 'Código Postal fiscal del cliente'
            )
        ));
    }
}
