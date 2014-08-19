<?php

/**
 * ExpensetransactionFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransaction\Form;

// - ACL - //
use API\REST\V1\ACL\Expense\Expensetransaction\Form\ExpensetransactionForm;

/**
 * Class ExpensetransactionFormGET
 * @package API\REST\V1\ACL\Expense\Expensetransaction\Form
 */
class ExpensetransactionFormGET
{
    /**
     * @param $userlevel
     * @return ExpensetransactionForm
     */
    public static function init($userlevel){
        $ExpensetransactionForm = new ExpensetransactionForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $ExpensetransactionForm->remove('Expensetransaction_value');
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