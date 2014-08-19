<?php

/**
 * ExpensetransactionFileFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransactionfile\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expensetransactionfile\Form\ExpensetransactionfileForm;

/**
 * Class ExpensetransactionfileFormPostPut
 * @package API\REST\V1\ACL\Expense\Expensetransactionfile\Form
 */
class ExpensetransactionfileFormPostPut{

    /**
     * @param $userLevel
     * @return ExpensetransactionfileForm
     */
    public static function init($userLevel){

        $ExpensetransactionfileForm = new ExpensetransactionfileForm();

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

        return $ExpensetransactionfileForm;
    }

}

