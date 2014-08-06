<?php
namespace SATMexico\V1\REST\ACL\ClientTax\Form;

use SATMexico\V1\REST\ACL\ClientTax\Form\ClientTaxForm;

class ClientTaxFormPostPut{

    public static function init($userLevel){

        $clientTaxForm = new ClientTaxForm();

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

        return $clientTaxForm;
    }

}

