<?php

/**
 * BranchForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branch\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class BranchForm
 * @package API\REST\V1\ACL\Company\Branch\Form
 */
class BranchForm extends Form
{
    public function __construct()
    {
        parent::__construct('BranchForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch',
            'options' => array(
                'label' => 'id branch',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'id company',
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_name',
            'options' => array(
                'label' => 'branch name',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_iso_codecountry',
            'options' => array(
                'label' => 'code country',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_address',
            'options' => array(
                'label' => 'address',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_address2',
            'options' => array(
                'label' => 'address 2',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_city',
            'options' => array(
                'label' => 'city',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_state',
            'options' => array(
                'label' => 'state',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_zipcode',
            'options' => array(
                'label' => 'zip code',
            ),
        ));
    }
}
