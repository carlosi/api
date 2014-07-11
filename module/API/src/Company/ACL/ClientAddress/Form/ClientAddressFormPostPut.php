<?php
namespace Company\ACL\ClientAddress\Form;

use Company\ACL\ClientAddress\Form\ClientAddressForm;

class ClientAddressFormPostPut{

    public static function init($userLevel){

        $clientAddressForm = new ClientAddressForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {


                $clientAddressForm->remove('clientaddress_iso_codecountry');
                $clientAddressForm->add(array(
                    'type' => 'Select',
                    'name' => 'clientaddress_iso_codecountry',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('MX'),
                    ),
                ));

                $clientAddressForm->remove('clientaddress_iso_codephone');
                $clientAddressForm->add(array(
                    'type' => 'Select',
                    'name' => 'clientaddress_iso_codephone',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('+52'),
                    ),
                ));
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

