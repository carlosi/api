<?php

/**
 * ExpenserecurrencyFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expenserecurrency\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expenserecurrency\Form\ExpenserecurrencyForm;

/**
 * Class ExpenserecurrencyFormGET
 * @package API\REST\V1\ACL\Expense\Expenserecurrency\Form
 */
class ExpenserecurrencyFormGET
{
    /**
     * @param $userlevel
     * @return ExpenserecurrencyForm
     */
    public static function init($userlevel){
        $ExpenserecurrencyForm = new ExpenserecurrencyForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $ExpenserecurrencyForm->remove('Expenserecurrency_themevalue');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $ExpenserecurrencyForm;
    }
}