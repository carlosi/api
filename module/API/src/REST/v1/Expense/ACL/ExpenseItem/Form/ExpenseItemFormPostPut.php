<?php
namespace REST\v1\Expense\ACL\ExpenseItem\Form;

use REST\v1\Expense\ACL\ExpenseItem\Form\ExpenseItemForm;

class ExpenseItemFormPostPut{

    public static function init($userLevel){

        $expenseItemForm = new ExpenseItemForm();

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

        return $expenseItemForm;
    }

}

