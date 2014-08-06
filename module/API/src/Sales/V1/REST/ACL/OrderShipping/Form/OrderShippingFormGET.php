<?php

namespace Sales\V1\REST\ACL\OrderRecord\Form;

use Sales\V1\REST\ACL\OrderShipping\Form\OrderShippingForm;

class OrderShippingFormGET
{
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

                $orderShippingForm->remove('idshipping');
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