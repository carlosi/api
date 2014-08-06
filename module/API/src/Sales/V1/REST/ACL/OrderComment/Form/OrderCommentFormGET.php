<?php

namespace Sales\V1\REST\ACL\OrderComment\Form;

use Sales\V1\REST\ACL\OrderComment\Form\OrderCommentForm;

class OrderCommentFormGET
{
    public static function init($userlevel){

        $orderCommentForm = new OrderCommentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderCommentForm->remove('ordercomment_note');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $orderCommentForm;
    }
}