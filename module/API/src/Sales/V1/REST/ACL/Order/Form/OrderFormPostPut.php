<?php
namespace Sales\V1\REST\ACL\Order\Form;

use Sales\V1\REST\ACL\Order\Form\OrderForm;

class OrderFormPostPut{

    public static function init($userLevel){

        $orderForm = new OrderForm();

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

        return $orderForm;
    }

}