<?php

/**
 * BankaccountForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Bankaccount\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class BankaccountForm
 * @package API\REST\V1\ACL\Company\Bankaccount\Form
 */
class BankaccountForm extends Form
{
    public function __construct()
    {
        parent::__construct('BankaccountForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankaccount',
            'options' => array(
                'label' => 'id bank account'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'id company'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankaccount_name',
            'options' => array(
                'label' => 'Cuenta bancaria'
            ),
        ));
    }
}