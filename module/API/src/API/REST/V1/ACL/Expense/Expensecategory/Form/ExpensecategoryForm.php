<?php

/**
 * ExpensecategoryForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensecategory\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ExpensecategoryForm
 * @package API\REST\V1\ACL\Expense\Expensecategory\Form
 */
class ExpensecategoryForm extends Form
{
    public function __construct(){
        parent::__construct('ExpensecategoryForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensecategory',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensecategory_dependency',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensecategory_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensecategory_description',
        ));
    }
}