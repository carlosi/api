<?php

namespace Sales\ACL\OrderItem;

use Sales\ACL\OrderItem\OrderItemForm;

class OrderItemFormGET{

    public static function init($userlevel){

        $orderItemForm = new OrderItemForm();

        switch($userlevel){

            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderItemForm->remove('quantity');
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