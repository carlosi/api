<?php

/**
 * OrderfileFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderfile\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderfile\Form\OrderfileForm;

/**
 * Class OrderfileFormGET
 * @package API\REST\V1\ACL\Sales\Orderfile\Form
 */
class OrderfileFormGET
{
    /**
     * @param $userlevel
     * @return OrderfileForm
     */
    public static function init($userlevel){

        $OrderfileForm = new OrderfileForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $OrderfileForm->remove('Orderfile_note');
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