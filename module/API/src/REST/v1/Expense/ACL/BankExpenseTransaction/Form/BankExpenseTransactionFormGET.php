<?php

namespace REST\v1\Expense\ACL\BankExpenseTransaction\Form;

use REST\v1\Expense\ACL\BankExpenseTransaction\Form\BankExpenseTransactionForm;

class BankExpenseTransactionFormGET
{
    public static function init($userlevel){
        $bankExpenseTransactionForm = new BankExpenseTransactionForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $bankExpenseTransactionForm->remove('bankexpensetransaction_amount');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $bankExpenseTransactionForm;
    }
}