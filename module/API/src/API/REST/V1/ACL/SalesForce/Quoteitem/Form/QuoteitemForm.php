<?php

/**
 * QuoteitemForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Quoteitem\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class QuoteForm
 * @package API\REST\V1\ACL\SalesForce\Quoteitem\Form
 */
class QuoteitemForm extends Form
{
    public function __construct()
    {
        parent::__construct('QuoteitemForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idquoteitem',
            'options' => array(
                'label' => 'id quote item'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idquote',
            'options' => array(
                'label' => 'id quote'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproduct',
            'options' => array(
                'label' => 'id product'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderquote_quantity',
            'options' => array(
                'label' => 'orderquote quantity'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderquote_officialvalue',
            'options' => array(
                'label' => 'orderquote official value'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderquote_endvalue',
            'options' => array(
                'label' => 'orderquote end value'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'orderquote_note',
            'options' => array(
                'label' => 'orderquote note'
            ),
        ));
    }
}