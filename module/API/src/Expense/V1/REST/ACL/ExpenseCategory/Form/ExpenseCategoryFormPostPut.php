<?php
namespace Expense\V1\REST\ACL\ExpenseCategory\Form;

use Expense\V1\REST\ACL\ExpenseCategory\Form\ExpenseCategoryForm;

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

