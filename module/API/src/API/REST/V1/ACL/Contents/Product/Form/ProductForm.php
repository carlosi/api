<?php

/**
 * ProductForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Product\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductForm
 * @package API\REST\V1\ACL\Contents\Product\Form
 */
class ProductForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproduct',
            'options' => array(
                'label' => 'Id Producto'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',
            'options' => array(
                'label' => 'Id Producto'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'property_array',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'product_status',
        ));
    }
}
