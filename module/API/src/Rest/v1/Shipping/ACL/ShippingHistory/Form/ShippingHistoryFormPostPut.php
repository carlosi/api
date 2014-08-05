<?php
namespace Shipping\ACL\ShippingHistory\Form;

use Shipping\ACL\ShippingHistory\Form\ShippingHistoryForm;

class ShippingHistoryFormPostPut{

    public static function init($userLevel){

        $shippingHistoryForm = new ShippingHistoryForm();

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

        return $shippingHistoryForm;
    }

}