<?php

/**
 * ExpensecategoryFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensecategory\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expensecategory\Form\ExpensecategoryForm;

/**
 * Class ExpensecategoryFormGET
 * @package API\REST\V1\ACL\Expense\Expensecategory\Form
 */
class ExpensecategoryFormGET
{
    /**
     * @param $userlevel
     * @return ExpensecategoryForm
     */
    public static function init($userlevel){
        $ExpensecategoryForm = new ExpensecategoryForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $ExpensecategoryForm->remove('Expensecategory_description');
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