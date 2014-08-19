<?php

/**
 * ProductmainphotoFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productmainphoto\Form;

// - ACL - //
use API\REST\V1\ACL\Contents\Productmainphoto\Form\ProductmainphotoForm;

/**
 * Class ProductmainphotoFormGET
 * @package API\REST\V1\ACL\Contents\Productmainphoto\Form
 */
class ProductmainphotoFormGET{

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

                $ProductmainphotoForm->remove('Productmainphoto_width');
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

