<?php
namespace Company\ACL\ExpenseTransactionFile\Form;

use Company\ACL\ExpenseTransactionFile\Form\ExpenseTransactionFileForm;

class ExpenseTransactionFileFormPostPut{

    public static function init($userLevel){

        $expenseTransactionFileForm = new ExpenseTransactionFileForm();

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

        return $expenseTransactionFileForm;
    }

}

