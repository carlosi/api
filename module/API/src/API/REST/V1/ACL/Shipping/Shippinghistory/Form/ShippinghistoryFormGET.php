<?php

/**
 * ShippinghistoryFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Shipping\Shippinghistory\Form;

// - ACL - //
use API\REST\V1\ACL\Shipping\Shippinghistory\Form\ShippinghistoryForm;

/**
 * Class ShippinghistoryFormGET
 * @package API\REST\V1\ACL\Shipping\Shippinghistory\Form
 */
class ShippinghistoryFormGET
{
    /**
     * @param $userLevel
     * @return ShippinghistoryForm
     */
    public static function init($userLevel){

        $ShippinghistoryForm = new ShippinghistoryForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $ShippinghistoryForm->remove('shipping_history_msg');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $ShippinghistoryForm;
    }

}