<?php

/**
 * OrderFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Order\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Order\Form\OrderForm;

/**
 * Class OrderFormGET
 * @package API\REST\V1\ACL\Sales\Order\Form
 */
class OrderFormGET
{
    /**
     * @param $userlevel
     * @return OrderForm
     */
    public static function init($userlevel){

        $orderForm = new OrderForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderForm->remove('created_at');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $orderForm;
    }
}