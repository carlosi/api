<?php

/**
 * OrderrecordFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderrecord\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderrecord\Form\OrderrecordForm;

/**
 * Class OrderrecordFormPostPut
 * @package API\REST\V1\ACL\Sales\Orderrecord\Form
 */
class OrderrecordFormPostPut{

    /**
     * @param $userLevel
     * @return OrderrecordForm
     */
    public static function init($userLevel){

        $OrderrecordForm = new OrderrecordForm();

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

        return $OrderrecordForm;
    }

}