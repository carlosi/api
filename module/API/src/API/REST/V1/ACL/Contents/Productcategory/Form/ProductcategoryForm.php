<?php

/**
 * ProductcategoryForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productcategory\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductcategoryForm
 * @package API\REST\V1\ACL\Contents\Productcategory\Form
 */
class ProductcategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductcategoryForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategory',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'category_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productcategory_dependency',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'product_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'ACTIVE' => 'ACTIVE',
                    'INACTIVE' => 'INACTIVE',
                ),
            ),
            'attributes' => array(
                'ACTIVE' => 'ACTIVE' //set selected to 'ACTIVE'
            )
        ));
    }
}
