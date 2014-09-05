<?php

/**
 * BankexpensetransactionFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Bankexpensetransaction\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\BankExpensetransaction\Form\BankExpensetransactionForm;

/**
 * Class BankexpensetransactionFormGET
 * @package API\REST\V1\ACL\Expense\BankExpensetransaction\Form
 */
class BankexpensetransactionFormGET
{
    /**
     * @param $userlevel
     * @return BankExpensetransactionForm
     */
    public static function init($userlevel){
        $BankExpensetransactionForm = new BankExpensetransactionForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $BankExpensetransactionForm->remove('BankExpensetransaction_amount');
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