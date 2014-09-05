<?php

/**
 * ShippingFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Shipping\Shipping\Form;

// - ACL - //
use API\REST\V1\ACL\Shipping\Shipping\Form\ShippingForm;

/**
 * Class ShippingFormGET
 * @package API\REST\V1\ACL\Shipping\Shipping\Form
 */
class ShippingFormGET
{
    /**
     * @param $userLevel
     * @return ShippingForm
     */
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