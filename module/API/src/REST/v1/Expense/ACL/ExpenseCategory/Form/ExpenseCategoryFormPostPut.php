<?php
namespace REST\v1\Expense\ACL\ExpenseCategory\Form;

use REST\v1\Expense\ACL\ExpenseCategory\Form\ExpenseCategoryForm;

class ExpenseCategoryFormPostPut{

    public static function init($userLevel){

        $expenseCategoryForm = new ExpenseCategoryForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

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

