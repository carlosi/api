<?php

namespace REST\v1\Expense\ACL\ExpenseCategory\Form;

use REST\v1\Expense\ACL\ExpenseCategory\Form\ExpenseCategoryForm;

class ExpenseCategoryFormGET
{
    public static function init($userlevel){
        $expenseCategoryForm = new ExpenseCategoryForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $expenseCategoryForm->remove('expensecategory_description');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $expenseCategoryForm;
    }
}