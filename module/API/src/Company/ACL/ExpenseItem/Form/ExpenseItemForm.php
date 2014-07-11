<?php

namespace Company\ACL\ExpenseItem\Form;

use Zend\Form\Form;

class ExpenseItemForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenseItemForm');

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
        $this->add(array(
            'type' => 'Select',
            'name' => 'expenseitem_cause',
        ));
    }
}