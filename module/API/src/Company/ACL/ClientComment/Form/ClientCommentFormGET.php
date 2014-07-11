<?php

namespace Company\ACL\ClientComment\Form;

use Company\ACL\ClientComment\Form\ClientCommentForm;

class ClientCommentFormGET
{
    public static function init($userlevel){

        $clientCommentFormGET = new ClientCommentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $clientCommentFormGET->remove('clientcomment_note');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $clientCommentFormGET;
    }
}