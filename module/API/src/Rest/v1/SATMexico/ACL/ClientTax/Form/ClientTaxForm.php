<?php

namespace SATMexico\ACL\ClientTax\Form;

use Zend\Form\Form;

class ClientTaxForm extends Form
{
    public function __construct(){
        parent::__construct('ClientTaxForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclienttax'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_iso_codecountry',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_iso_codephone',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_taxesid',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_address',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clienttax_zipcode',
        ));
    }
}
