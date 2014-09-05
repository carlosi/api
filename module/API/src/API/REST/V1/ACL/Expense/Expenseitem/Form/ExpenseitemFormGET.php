<?php

/**
 * ExpenseitemFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expenseitem\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expenseitem\Form\ExpenseitemForm;

/**
 * Class ExpenseitemFormGET
 * @package API\REST\V1\ACL\Expense\Expenseitem\Form
 */
class ExpenseitemFormGET
{
    /**
     * @param $userlevel
     * @return ExpenseitemForm
     */
    public static function init($userlevel){
        $ExpenseitemForm = new ExpenseitemForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $ExpenseitemForm->remove('Expenseitem_description');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $ExpenseitemForm;
    }
}