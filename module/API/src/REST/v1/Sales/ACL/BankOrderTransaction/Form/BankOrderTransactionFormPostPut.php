<?php
namespace REST\v1\Sales\ACL\BankOrderTransaction\Form;

use REST\v1\Sales\ACL\BankOrderTransaction\Form\BankOrderTransactionForm;

class BankOrderTransactionFormPostPut{

    public static function init($userLevel){

        $bankOrderTransactionForm = new BankOrderTransactionForm();

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

        return $bankOrderTransactionForm;
    }

}