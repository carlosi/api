<?php

/**
 * QuoteForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Quote\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class QuoteForm
 * @package API\REST\V1\ACL\SalesForce\Quote\Form
 */
class QuoteForm extends Form
{
    public function __construct()
    {
        parent::__construct('QuoteForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idquote',
            'options' => array(
                'label' => 'id quote'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idtriggerprospection',
            'options' => array(
                'label' => 'id trigger prospection'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'quote_dateexpiration',
            'options' => array(
                'label' => 'quote date expiration'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'quote_status',
            'options' => array(
                'label' => 'quote status'
            ),
        ));
    }
}