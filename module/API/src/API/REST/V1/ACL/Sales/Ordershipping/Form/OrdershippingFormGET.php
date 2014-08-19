<?php

/**
 * OrdershippingFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderrecord\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Ordershipping\Form\OrdershippingForm;

/**
 * Class OrdershippingFormGET
 * @package API\REST\V1\ACL\Sales\Orderrecord\Form
 */
class OrdershippingFormGET
{
    /**
     * @param $userlevel
     * @return OrdershippingForm
     */
    public static function init($userlevel){

        $OrdershippingForm = new OrdershippingForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $OrdershippingForm->remove('idshipping');
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