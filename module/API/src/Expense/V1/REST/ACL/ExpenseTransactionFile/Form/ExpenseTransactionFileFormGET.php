<?php

namespace Expense\V1\REST\ACL\ExpenseTransactionFile\Form;

use Expense\V1\REST\ACL\ExpenseTransactionFile\Form\ExpenseTransactionFileForm;

class ExpenseTransactionFileFormGET
{
    public static function init($userlevel){
        $expenseTransactionFileForm = new ExpenseTransactionFileForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $expenseTransactionFileForm->remove('expensetransactionfile_url');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $expenseTransactionFileForm;
    }
}