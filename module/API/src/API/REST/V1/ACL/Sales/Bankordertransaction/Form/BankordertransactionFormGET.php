<?php

/**
 * BankordertransactionFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Bankordertransaction\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Bankordertransaction\Form\BankordertransactionForm;

/**
 * Class BankordertransactionFormGET
 * @package API\REST\V1\ACL\Sales\Bankordertransaction\Form
 */
class BankordertransactionFormGET
{
    /**
     * @param $userlevel
     * @return BankordertransactionForm
     */
    public static function init($userlevel){

        $BankordertransactionForm = new BankordertransactionForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $BankordertransactionForm->remove('Bankordertransaction_amount');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $BankordertransactionForm;
    }
}