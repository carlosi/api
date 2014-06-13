<?php

namespace Sales\ACL\OrderShipping;

use Sales\ACL\OrderShipping\OrderShippingForm;

class OrderShippingFormGET{

    public static function init($userlevel){

        $orderShippingForm = new OrderShippingForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderShippingForm->remove('shipping_tracking');
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