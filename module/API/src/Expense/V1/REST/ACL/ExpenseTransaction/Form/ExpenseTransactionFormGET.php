<?php

namespace Expense\V1\REST\ACL\ExpenseTransaction\Form;

use Expense\V1\REST\ACL\ExpenseTransaction\Form\ExpenseTransactionForm;

class ExpenseTransactionFormGET
{
    public static function init($userlevel){
        $expenseTransactionForm = new ExpenseTransactionForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $expenseTransactionForm->remove('expensetransaction_value');
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