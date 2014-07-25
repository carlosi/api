<?php
namespace Shipping\ACL\ShippingHistory\Form;

use Shipping\ACL\ShippingHistory\Form\ShippingHistoryForm;

class ShippingHistoryFormGET
{
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

                $shippingHistoryForm->remove('shipping_history_msg');
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