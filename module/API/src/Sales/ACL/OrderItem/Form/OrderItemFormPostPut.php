<?php
namespace Sales\ACL\OrderItem\Form;

use Sales\ACL\OrderItem\Form\OrderItemForm;

class OrderItemFormPostPut{

    public static function init($userLevel){

        $orderItemForm = new OrderItemForm();

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

        return $orderItemForm;
    }

}