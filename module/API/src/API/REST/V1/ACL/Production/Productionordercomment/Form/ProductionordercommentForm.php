<?php

/**
 * ProductionordercommentForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionordercomment\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductionordercommentForm
 * @package API\REST\V1\ACL\Production\Productionordercomment\Form
 */
class ProductionordercommentForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionordercommentForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionordercomment',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionOrderitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionordercomment_comment',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionordercomment_date',

        ));
    }
}
