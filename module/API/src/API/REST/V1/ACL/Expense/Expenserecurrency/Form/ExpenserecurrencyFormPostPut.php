<?php

/**
 * ExpenserecurrencyFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expenserecurrency\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expenserecurrency\Form\ExpenserecurrencyForm;

/**
 * Class ExpenserecurrencyFormPostPut
 * @package API\REST\V1\ACL\Expense\Expenserecurrency\Form
 */
class ExpenserecurrencyFormPostPut{

    /**
     * @param $userLevel
     * @return ExpenserecurrencyForm
     */
    public static function init($userLevel){

        $ExpenserecurrencyForm = new ExpenserecurrencyForm();

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

        return $ExpenserecurrencyForm;
    }

}

