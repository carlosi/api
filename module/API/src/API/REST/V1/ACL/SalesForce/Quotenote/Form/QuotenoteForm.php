<?php

/**
 * QuotenoteForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quotenote\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class QuoteForm
 * @package API\REST\V1\ACL\Salesforce\Quotenote\Form
 */
class QuotenoteForm extends Form
{
    public function __construct()
    {
        parent::__construct('QuotenoteForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idquotenote',
            'options' => array(
                'label' => 'id quote note'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'id user'
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
            'name' => 'quotenote_note',
            'options' => array(
                'label' => 'quotenote note'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'quotenote_date',
            'options' => array(
                'label' => 'quotenote date'
            ),
        ));
    }
}