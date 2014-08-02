<?php

namespace REST\v1\Sales\ACL\Order\Form;

use REST\v1\Sales\ACL\Order\Form\OrderForm;

class OrderFormGET
{
    public static function init($userlevel){

        $orderForm = new OrderForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderForm->remove('created_at');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $orderForm;
    }
}