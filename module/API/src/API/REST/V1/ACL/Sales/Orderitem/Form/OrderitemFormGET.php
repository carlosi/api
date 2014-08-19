<?php

/**
 * OrderitemFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderitem\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderitem\Form\OrderitemForm;

/**
 * Class OrderitemFormGET
 * @package API\REST\V1\ACL\Sales\Orderitem\Form
 */
class OrderitemFormGET
{
    /**
     * @param $userlevel
     * @return OrderitemForm
     */
    public static function init($userlevel){

        $OrderitemForm = new OrderitemForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $OrderitemForm->remove('Orderitem_note');
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