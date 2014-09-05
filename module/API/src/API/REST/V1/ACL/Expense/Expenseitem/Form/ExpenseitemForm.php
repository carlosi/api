<?php

/**
 * ExpenseitemForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expenseitem\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ExpenseitemForm
 * @package API\REST\V1\ACL\Expense\Expenseitem\Form
 */
class ExpenseitemForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenseitemForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpenseitem',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensecategory'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expenseitem_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expenseitem_description',
        ));
    }
}