<?php
namespace Shipping\V1\REST\ACL\Shipping\Form;

use Shipping\V1\REST\ACL\Shipping\Form\ShippingForm;

class ShippingFormGET
{
    public static function init($userLevel){

        $shippingForm = new ShippingForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $shippingForm->remove('shipping_datecompromise');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $shippingForm;
    }

}