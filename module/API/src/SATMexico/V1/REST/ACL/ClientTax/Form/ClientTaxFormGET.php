<?php

namespace SATMexico\V1\REST\ACL\ClientTax\Form;

use SATMexico\V1\REST\Acl\ClientTax\Form\ClientTaxForm;

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