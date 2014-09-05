<?php

/**
 * ProductionstatusForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionstatus\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductionstatusForm
 * @package API\REST\V1\ACL\Production\Productionstatus\Form
 */
class ProductionstatusForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionstatusForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionstatus',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionstatus_name',

        ));
    }
}
