<?php
namespace REST\v1\Sales\ACL\OrderShipping\Form;

use REST\v1\Sales\ACL\OrderShipping\Form\OrderShippingForm;

class OrderShippingFormPostPut{

    public static function init($userLevel){

        $orderShippingForm = new OrderShippingForm();

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

        return $orderShippingForm;
    }

}