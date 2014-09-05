<?php

/**
 * OrderfileFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderfile\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderfile\Form\OrderfileForm;

/**
 * Class OrderfileFormPostPut
 * @package API\REST\V1\ACL\Sales\Orderfile\Form
 */
class OrderfileFormPostPut{

    /**
     * @param $userLevel
     * @return OrderfileForm
     */
    public static function init($userLevel){

        $OrderfileForm = new OrderfileForm();

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

        return $OrderfileForm;
    }

}