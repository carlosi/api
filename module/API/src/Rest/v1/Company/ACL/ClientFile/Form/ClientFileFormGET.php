<?php

namespace Company\ACL\ClientFile\Form;

use Company\ACL\ClientFile\Form\ClientFileForm;

class ClientFileFormGET
{
    public static function init($userlevel){

        $clientFileForm = new ClientFileForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4 :{

                break;
            }
            case 3: {
                $clientFileForm->remove('clientfile_url');
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