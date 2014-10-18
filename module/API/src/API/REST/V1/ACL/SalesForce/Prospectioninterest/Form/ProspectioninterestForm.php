<?php

/**
 * ProspectioninterestForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 17/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Prospectioninterest\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProspectioninterestForm
 * @package API\REST\V1\ACL\Salesforce\Prospectioninterest\Form
 */
class ProspectioninterestForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProspectioninterestForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idprospectioninterest',
            'options' => array(
                'label' => 'id prospection interest'
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
            'name' => 'idtriggerprospection',
            'options' => array(
                'label' => 'id trigger prospection'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'prospectioninterest_level',
            'options' => array(
                'label' => 'prospection interest level'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'prospectioninterest_date',
            'options' => array(
                'label' => 'prospection interest date'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'prospectioninterest_note',
            'options' => array(
                'label' => 'prospection interest note'
            ),
        ));
    }
}