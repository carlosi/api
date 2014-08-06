<?php
namespace Company\ACL\ClientFile\Form;

use Company\V1\REST\ACL\ClientFile\Form\ClientFileForm;

class ClientFileFormPostPut{

    public static function init($userLevel){

        $clientFileForm = new ClientFileForm();

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

        return $clientFileForm;
    }

}

