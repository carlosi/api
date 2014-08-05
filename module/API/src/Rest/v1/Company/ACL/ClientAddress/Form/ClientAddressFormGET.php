<?php

namespace Company\ACL\ClientAddress\Form;

use Company\ACL\ClientAddress\Form\ClientAddressForm;

class ClientAddressFormGET
{
    public static function init($userlevel){

        $clientAddressForm = new ClientAddressForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $clientAddressForm->remove('clientaddress_addressee');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $clientAddressForm;
    }
}