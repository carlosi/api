<?php

/**
 * TriggerprospectionForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospection\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class TriggerprospectionForm
 * @package API\REST\V1\ACL\Salesforce\Triggerprospection\Form
 */
class TriggerprospectionForm extends Form
{
    public function __construct()
    {
        parent::__construct('TriggerprospectionForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idtriggerprospection',
            'options' => array(
                'label' => 'id trigger prospection'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'id client'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'triggerprospection_date',
            'options' => array(
                'label' => 'trigger prospection date'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'triggerprospection_by',
            'options' => array(
                'label' => 'trigger prospection by'
            ),
        ));
    }
}