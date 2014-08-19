<?php

/**
 * OrderFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Order\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Order\Form\OrderForm;

/**
 * Class OrderFormPostPut
 * @package API\REST\V1\ACL\Sales\Order\Form
 */
class OrderFormPostPut{

    /**
     * @param $userLevel
     * @return OrderForm
     */
    public static function init($userLevel){

        $orderForm = new OrderForm();

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

        return $orderForm;
    }

}