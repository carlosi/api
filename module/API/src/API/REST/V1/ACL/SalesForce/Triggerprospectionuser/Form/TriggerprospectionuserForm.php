<?php

/**
 * TriggerprospectionuserForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospectionuser\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class TriggerprospectionuserForm
 * @package API\REST\V1\ACL\Salesforce\Triggerprospectionuser\Form
 */
class TriggerprospectionuserForm extends Form
{
    public function __construct()
    {
        parent::__construct('TriggerprospectionuserForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idtriggerprospectionuser',
            'options' => array(
                'label' => 'id trigger prospection user'
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
            'name' => 'iduser',
            'options' => array(
                'label' => 'id user'
            ),
        ));
    }
}