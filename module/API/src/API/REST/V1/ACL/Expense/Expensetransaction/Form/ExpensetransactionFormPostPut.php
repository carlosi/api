<?php

/**
 * ExpensetransactionFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransaction\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expensetransaction\Form\ExpensetransactionForm;

/**
 * Class ExpensetransactionFormPostPut
 * @package API\REST\V1\ACL\Expense\Expensetransaction\Form
 */
class ExpensetransactionFormPostPut{

    /**
     * @param $userLevel
     * @return ExpensetransactionForm
     */
    public static function init($userLevel){

        $ExpensetransactionForm = new ExpensetransactionForm();

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

        return $ExpensetransactionForm;
    }

}

