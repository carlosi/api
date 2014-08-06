<?php
namespace Sales\V1\REST\ACL\OrderShipping\Form;

use Sales\V1\REST\ACL\OrderShipping\Form\OrderShippingForm;

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