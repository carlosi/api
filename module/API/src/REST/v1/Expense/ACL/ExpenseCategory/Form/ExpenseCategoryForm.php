<?php

namespace REST\v1\Expense\ACL\ExpenseCategory\Form;

use Zend\Form\Form;

class ExpenseCategoryForm extends Form
{
    public function __construct(){
        parent::__construct('ExpenseCategoryForm');

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