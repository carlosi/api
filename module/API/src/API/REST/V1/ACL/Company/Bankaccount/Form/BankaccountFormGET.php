<?php

/**
 * BankaccountFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Bankaccount\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Bankaccount\Form\BankaccountForm;

/**
 * Class BankaccountFormGET
 * @package API\REST\V1\ACL\Company\Bankaccount\Form
 */
class BankaccountFormGET
{
    /**
     * @param $userlevel
     * @return BankaccountForm
     */
    public static function init($userlevel){

        $BankaccountForm = new BankaccountForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $BankaccountForm->remove('Bankaccount_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $BankaccountForm;
    }
}