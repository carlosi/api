<?php

/**
 * ProductmainFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productmain\Form;

// - ACL - //
use API\REST\V1\ACL\Contents\Productmain\Form\ProductmainForm;

/**
 * Class ProductmainFormGET
 * @package API\REST\V1\ACL\Contents\Productmain\Form
 */
class ProductmainFormGET{

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

                $ProductmainForm->remove('Productmain_eachpieces');
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

