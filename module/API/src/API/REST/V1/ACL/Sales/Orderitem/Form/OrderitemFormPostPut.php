<?php

/**
 * OrderitemFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderitem\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderitem\Form\OrderitemForm;

/**
 * Class OrderitemFormPostPut
 * @package API\REST\V1\ACL\Sales\Orderitem\For
 */
class OrderitemFormPostPut{

    /**
     * @param $userLevel
     * @return OrderitemForm
     */
    public static function init($userLevel){

        $OrderitemForm = new OrderitemForm();

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

        return $OrderitemForm;
    }

}