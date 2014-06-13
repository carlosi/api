<?php

namespace Company\ACL\BankAccount;

use Company\ACL\BankAccount\BankAccountForm;

class BankAccountFormGET
{
    public static function init($userlevel){

        $bankAccountForm = new BankAccountForm();

        switch ($userlevel){
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