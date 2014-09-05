<?php

/**
 * OrdershippingForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Ordershipping\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class OrdershippingForm
 * @package API\REST\V1\ACL\Sales\Ordershipping\Form
 */
class OrdershippingForm extends Form
{
    public function __construct(){
        parent::__construct('OrdershippingForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idordershipping'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping'
        ));
    }
}