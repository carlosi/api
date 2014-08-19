<?php

/**
 * ProductmainphotoForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productmainphoto\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductmainphotoForm
 * @package API\REST\V1\ACL\Contents\Productmainphoto\Form
 */
class ProductmainphotoForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductmainphotoForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmainphoto',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmainphoto_url',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmainphoto_width',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmainphoto_height',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productmainphoto_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'pending' => 'pending',
                    'rejected' => 'rejected',
                    'active' => 'active',
                    'revision' => 'revision',
                ),
            ),
        ));
    }
}
