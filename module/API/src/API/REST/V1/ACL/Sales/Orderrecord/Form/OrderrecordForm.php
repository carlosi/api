<?php

/**
 * OrderrecordForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderrecord\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class OrderrecordForm
 * @package API\REST\V1\ACL\Sales\Orderrecord\Form
 */
class OrderrecordForm extends Form
{
    public function __construct(){
        parent::__construct('OrderrecordForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderrecord'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderrecord_date'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderrecord_event'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderrecord_note'
        ));
    }
}