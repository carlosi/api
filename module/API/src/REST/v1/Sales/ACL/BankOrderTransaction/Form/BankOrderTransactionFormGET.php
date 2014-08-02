<?php

namespace REST\v1\Sales\ACL\BankOrderTransaction\Form;

use REST\v1\Sales\ACL\BankOrderTransaction\Form\BankOrderTransactionForm;

class BankOrderTransactionFormGET
{
    public static function init($userlevel){

        $bankOrderTransactionForm = new BankOrderTransactionForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $bankOrderTransactionForm->remove('bankordertransaction_amount');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $bankOrderTransactionForm;
    }
}