<?php
namespace Company\ACL\ClientComment\Form;

use Company\ACL\ClientComment\Form\ClientCommentForm;

class ClientCommentFormPostPut{

    public static function init($userLevel){

        $clientCommentForm = new ClientCommentForm();

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

        return $clientCommentForm;
    }

}

