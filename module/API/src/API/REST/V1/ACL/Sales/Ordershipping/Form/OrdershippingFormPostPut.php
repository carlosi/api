<?php

/**
 * OrdershippingFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Ordershipping\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Ordershipping\Form\OrdershippingForm;

/**
 * Class OrdershippingFormPostPut
 * @package API\REST\V1\ACL\Sales\Ordershipping\Form
 */
class OrdershippingFormPostPut{

    /**
     * @param $userLevel
     * @return OrdershippingForm
     */
    public static function init($userLevel){

        $OrdershippingForm = new OrdershippingForm();

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

        return $OrdershippingForm;
    }

}