<?php

/**
 * ExpensetransactionFileFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransactionfile\Form;

// - AACL - //
use API\REST\V1\ACL\Expense\Expensetransactionfile\Form\ExpensetransactionfileForm;

/**
 * Class ExpensetransactionfileFormGET
 * @package API\REST\V1\ACL\Expense\Expensetransactionfile\Form
 */
class ExpensetransactionfileFormGET
{
    /**
     * @param $userlevel
     * @return ExpensetransactionfileForm
     */
    public static function init($userlevel){
        $ExpensetransactionfileForm = new ExpensetransactionfileForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $ExpensetransactionfileForm->remove('expensetransactionfile_url');
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