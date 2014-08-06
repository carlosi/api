<?php

namespace Expense\V1\REST\ACL\ExpenseItem\Form;

use Expense\V1\REST\ACL\ExpenseItem\Form\ExpenseItemForm;

class ExpenseItemFormGET
{
    public static function init($userlevel){
        $expenseItemForm = new ExpenseItemForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $expenseItemForm->remove('expenseitem_description');
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