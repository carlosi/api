<?php

/**
 * ProductionorderitemForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionorderitem\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductionOrderitemForm
 * @package API\REST\V1\ACL\Production\Productionorderitem\Form
 */
class ProductionorderitemForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionorderitemForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionOrderitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionteam',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionstatus',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_dateinit',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_datedelivery',

        ));
    }
}
