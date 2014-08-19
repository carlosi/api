<?php

/**
 * OrderfileForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderfile\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class OrderfileForm
 * @package API\REST\V1\ACL\Sales\Orderfile\Form
 */
class OrderfileForm extends Form
{
    public function __construct(){
        parent::__construct('OrderfileForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderfile'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderfile_url'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderfile_note'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderfile_uploaddate'
        ));
    }
}