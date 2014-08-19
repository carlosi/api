<?php

/**
 * BankaccountFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Bankaccount\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Bankaccount\Form\BankaccountForm;

/**
 * Class BankaccountFormPostPut
 * @package API\REST\V1\ACL\Company\Bankaccount\Form
 */
class BankaccountFormPostPut{

    /**
     * @param $userLevel
     * @return BankaccountForm
     */
    public static function init($userLevel){

        $BankaccountForm = new BankaccountForm();

        switch ($userLevel){

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