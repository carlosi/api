<?php

/**
 * ProductmainphotoFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productmainphoto\Form;

// - ACL - //
use API\REST\V1\ACL\Contents\Productmainphoto\Form\ProductmainphotoForm;

/**
 * Class ProductmainphotoFormPostPut
 * @package API\REST\V1\ACL\Contents\Productmainphoto\Form
 */
class ProductmainphotoFormPostPut{

    /**
     * @param $userLevel
     * @return ProductmainphotoForm
     */
    public static function init($userLevel){

        $ProductmainphotoForm = new ProductmainphotoForm();

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

        return $ProductmainphotoForm;
    }

}

