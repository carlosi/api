<?php
namespace REST\v1\Expense\ACL\ExpenseTransaction\Form;

use REST\v1\Expense\ACL\ExpenseTransaction\Form\ExpenseTransactionForm;

class ExpenseTransactionFormPostPut{

    public static function init($userLevel){

        $expenseTransactionForm = new ExpenseTransactionForm();

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

        return $expenseTransactionForm;
    }

}

