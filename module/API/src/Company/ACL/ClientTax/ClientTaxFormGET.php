<?php

namespace Company\ACL\ClientTax;

use Company\Acl\ClientTax\ClientTaxForm;

class ClientTaxFormGET
{
    public static function init($userlevel){
        $clientTaxForm = new ClientTaxForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $clientTaxForm->remove('clienttax_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $clientTaxForm;
    }
}