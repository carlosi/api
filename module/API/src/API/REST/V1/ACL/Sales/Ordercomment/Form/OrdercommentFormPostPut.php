<?php

/**
 * OrdercommentFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Ordercomment\Form;

// - ACL - //
use API\REST\V1\ACL\Sales\Ordercomment\Form\OrdercommentForm;

/**
 * Class OrdercommentFormPostPut
 * @package API\REST\V1\ACL\Sales\Ordercomment\Form
 */
class OrdercommentFormPostPut{

    /**
     * @param $userLevel
     * @return OrdercommentForm
     */
    public static function init($userLevel){

        $OrdercommentForm = new OrdercommentForm();

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

        return $OrdercommentForm;
    }

}