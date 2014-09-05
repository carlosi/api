<?php

/**
 * TriggerprospectionnoteForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Triggerprospectionnote\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class TriggerprospectionnoteForm
 * @package API\REST\V1\ACL\SalesForce\Triggerprospectionnote\Form
 */
class TriggerprospectionnoteForm extends Form
{
    public function __construct()
    {
        parent::__construct('TriggerprospectionnoteForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idtriggerprospectionnote',
            'options' => array(
                'label' => 'id trigger prospection note'
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
            'name' => 'triggerprospectionnote_note',
            'options' => array(
                'label' => 'trigger prospectionnote note'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'triggerprospectionnote_date',
            'options' => array(
                'label' => 'trigger prospectionnote date'
            ),
        ));
    }
}