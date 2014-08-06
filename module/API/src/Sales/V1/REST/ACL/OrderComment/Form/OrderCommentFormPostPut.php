<?php
namespace Sales\V1\REST\ACL\OrderComment\Form;

use Sales\V1\REST\ACL\OrderComment\Form\OrderCommentForm;

class OrderCommentFormPostPut{

    public static function init($userLevel){

        $orderCommentForm = new OrderCommentForm();

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

        return $orderCommentForm;
    }

}