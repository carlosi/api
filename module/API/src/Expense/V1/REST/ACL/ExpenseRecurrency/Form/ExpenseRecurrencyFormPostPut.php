<?php
namespace Expense\V1\REST\ACL\ExpenseRecurrency\Form;

use Expense\V1\REST\ACL\ExpenseRecurrency\Form\ExpenseRecurrencyForm;

class ExpenseRecurrencyFormPostPut{

    public static function init($userLevel){

        $expenseRecurrencyForm = new ExpenseRecurrencyForm();

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

        return $expenseRecurrencyForm;
    }

}

