<?php
namespace Company\V1\REST\ACL\BankAccount\Form;

use Company\V1\REST\ACL\BankAccount\Form\BankAccountForm;

class BankAccountFormPostPut{

    public static function init($userLevel){

        $bankAccountForm = new BankAccountForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $bankAccountForm->remove('bankaccount_name');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $bankAccountForm;
    }

}