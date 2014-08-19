<?php

/**
 * BankexpensetransactionFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Bankexpensetransaction\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Bankexpensetransaction\Form\BankExpensetransactionForm;

/**
 * Class BankexpensetransactionFormPostPut
 * @package API\REST\V1\ACL\Expense\BankExpensetransaction\Form
 */
class BankexpensetransactionFormPostPut{

    /**
     * @param $userLevel
     * @return BankExpensetransactionForm
     */
    public static function init($userLevel){

        $BankExpensetransactionForm = new BankExpensetransactionForm();

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

        return $BankExpensetransactionForm;
    }

}

