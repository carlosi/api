<?php

namespace Expense\V1\REST\ACL\ExpenseRecurrency\Form;

use Expense\V1\REST\ACL\ExpenseRecurrency\Form\ExpenseRecurrencyForm;

class ExpenseRecurrencyFormGET
{
    public static function init($userlevel){
        $expenseRecurrencyForm = new ExpenseRecurrencyForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $expenseRecurrencyForm->remove('expenserecurrency_themevalue');
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