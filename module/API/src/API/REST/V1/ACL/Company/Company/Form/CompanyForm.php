<?php

/**
 * CompanyForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Company\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class CompanyForm
 * @package API\REST\V1\ACL\Company\Company\Form
 */
class CompanyForm extends Form
{
    public function __construct(){
        parent::__construct('CompanyForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'Id Compañía',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_name',
            'options' => array(
                'label' => 'Nombre de compañia',
            ),
            
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_timezone',
            'options' => array(
                'label' => 'Zona horaria',
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'company_iso_codecountry',
            'options' => array(
                'label' => 'País',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_address',
            'options' => array(
                'label' => 'Dirección',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'company_address2',
            'options' => array(
                'label' => 'Colonia',
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
                'label' => 'Código postal',
            ),
        ));
    }
}