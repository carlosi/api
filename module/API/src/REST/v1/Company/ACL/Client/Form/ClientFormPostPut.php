<?php
namespace REST\v1\Company\ACL\Client\Form;

use REST\v1\Company\ACL\Client\Form\ClientForm;

class ClientFormPostPut
{

    public static function init($userLevel){

        $clientForm = new ClientForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $clientForm->remove('client_password');

                $clientForm->remove('client_status');
                $clientForm->add(array(
                    'type' => 'Select',
                    'name' => 'client_status',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('pending','active'),
                    ),
                ));
                $clientForm->remove('client_type');
                $clientForm->add(array(
                    'type' => 'Select',
                    'name' => 'client_type',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('NORMAL'),
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

        return $clientForm;
    }

}