<?php

/**
 * OrdercommentForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Ordercomment\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class OrdercommentForm
 * @package API\REST\V1\ACL\Sales\Ordercomment\Form
 */
class OrdercommentForm extends Form
{
    public function __construct(){
        parent::__construct('OrdercommentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idordercomment'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'ordercomment_note'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'ordercomment_date'
        ));
    }
}