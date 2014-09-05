<?php

/**
 * ShippinghistoryForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Shipping\Shippinghistory\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ShippinghistoryForm
 * @package API\REST\V1\ACL\Shipping\Shippinghistory\Form
 */
class ShippinghistoryForm extends Form
{
    public function __construct()
    {
        parent::__construct('ShippinghistoryForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping_history',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idemployee',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_history_msg',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_history_date',
        ));
    }
}
