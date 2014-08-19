<?php

/**
 * ProductionlineForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionline\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductionlineForm
 * @package API\REST\V1\ACL\Production\Productionline\Form
 */
class ProductionlineForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionlineForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionline_name',

        ));
    }
}
