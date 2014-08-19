<?php

/**
 * ExpensecategoryFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensecategory\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expensecategory\Form\ExpensecategoryForm;

/**
 * Class ExpensecategoryFormPostPut
 * @package API\REST\V1\ACL\Expense\Expensecategory\Form
 */
class ExpensecategoryFormPostPut{

    /**
     * @param $userLevel
     * @return ExpensecategoryForm
     */
    public static function init($userLevel){

        $ExpensecategoryForm = new ExpensecategoryForm();

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

        return $ExpensecategoryForm;
    }

}

