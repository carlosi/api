<?php
namespace Company\ACL\ClientTax\Form;

use Company\ACL\ClientTax\Form\ClientTaxForm;

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

