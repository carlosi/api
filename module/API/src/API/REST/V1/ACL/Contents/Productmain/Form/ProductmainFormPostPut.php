<?php

/**
 * ProductmainFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productmain\Form;

// - ACL - //
use API\REST\V1\ACL\Contents\Productmain\Form\ProductmainForm;

/**
 * Class ProductmainFormPostPut
 * @package API\REST\V1\ACL\Contents\Productmain\Form
 */
class ProductmainFormPostPut{

    /**
     * @param $userLevel
     * @return ProductmainForm
     */
    public static function init($userLevel){

        $ProductmainForm = new ProductmainForm();

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

        return $ProductmainForm;
    }

}

