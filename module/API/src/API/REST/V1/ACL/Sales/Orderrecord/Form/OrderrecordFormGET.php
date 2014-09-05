<?php

/**
 * OrderrecordFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderrecord\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderrecord\Form\OrderrecordForm;

/**
 * Class OrderrecordFormGET
 * @package API\REST\V1\ACL\Sales\Orderrecord\Form
 */
class OrderrecordFormGET
{
    /**
     * @param $userlevel
     * @return OrderrecordForm
     */
    public static function init($userlevel){

        $OrderrecordForm = new OrderrecordForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $OrderrecordForm->remove('Orderrecord_date');
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