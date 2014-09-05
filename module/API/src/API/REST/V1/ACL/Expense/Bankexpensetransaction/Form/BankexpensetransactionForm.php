<?php

/**
 * BankexpensetransactionForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Bankexpensetransaction\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class BankexpensetransactionForm
 * @package API\REST\V1\ACL\Expense\Bankexpensetransaction\Form
 */
class BankexpensetransactionForm extends Form
{
    public function __construct(){
        parent::__construct('BankexpensetransactionForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankexpensetransaction',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankaccount'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransaction',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankexpensetransaction_amount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankexpensetransaction_date',
        ));
    }
}