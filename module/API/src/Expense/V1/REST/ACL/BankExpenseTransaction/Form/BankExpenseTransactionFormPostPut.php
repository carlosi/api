<?php
namespace Expense\V1\REST\ACL\BankExpenseTransaction\Form;

use Expense\V1\REST\ACL\BankExpenseTransaction\Form\BankExpenseTransactionForm;

class BankExpenseTransactionFormPostPut{

    public static function init($userLevel){

        $bankExpenseTransactionForm = new BankExpenseTransactionForm();

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

        return $bankExpenseTransactionForm;
    }

}

