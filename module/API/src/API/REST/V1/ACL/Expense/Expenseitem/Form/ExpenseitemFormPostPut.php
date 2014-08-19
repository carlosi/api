<?php

/**
 * ExpenseitemFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expenseitem\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expenseitem\Form\ExpenseitemForm;

/**
 * Class ExpenseitemFormPostPut
 * @package API\REST\V1\ACL\Expense\Expenseitem\Form
 */
class ExpenseitemFormPostPut{

    /**
     * @param $userLevel
     * @return ExpenseitemForm
     */
    public static function init($userLevel){

        $ExpenseitemForm = new ExpenseitemForm();

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

        return $ExpenseitemForm;
    }

}

