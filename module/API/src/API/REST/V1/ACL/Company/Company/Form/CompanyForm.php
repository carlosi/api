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
       
    }
}