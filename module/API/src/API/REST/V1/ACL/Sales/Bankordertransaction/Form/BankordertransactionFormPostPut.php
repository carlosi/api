<?php

/**
 * BankordertransactionFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Bankordertransaction\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Bankordertransaction\Form\BankordertransactionForm;

/**
 * Class BankordertransactionFormPostPut
 * @package API\REST\V1\ACL\Sales\Bankordertransaction\Form
 */
class BankordertransactionFormPostPut{

    /**
     * @param $userLevel
     * @return BankordertransactionForm
     */
    public static function init($userLevel){

        $BankordertransactionForm = new BankordertransactionForm();

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

        return $BankordertransactionForm;
    }

}