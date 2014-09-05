<?php

/**
 * OrderitemForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderitem\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class OrderitemForm
 * @package API\REST\V1\ACL\Sales\Orderitem\Form
 */
class OrderitemForm extends Form
{
    public function __construct(){
        parent::__construct('OrderitemForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderitem'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproduct'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderitem_note'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'quantity'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'value'
        ));
    }
}