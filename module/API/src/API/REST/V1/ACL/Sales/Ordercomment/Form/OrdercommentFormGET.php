<?php

/**
 * OrdercommentFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Ordercomment\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Ordercomment\Form\OrdercommentForm;

/**
 * Class OrdercommentFormGET
 * @package API\REST\V1\ACL\Sales\Ordercomment\Form
 */
class OrdercommentFormGET
{
    public static function init($userlevel){

        $OrdercommentForm = new OrdercommentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $OrdercommentForm->remove('Ordercomment_note');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $OrdercommentForm;
    }
}