<?php

/**
 * ProductFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Product\Form;

// - ACL - //
use API\REST\V1\ACL\Contents\Product\Form\ProductForm;

/**
 * Class ProductFormGET
 * @package API\REST\V1\ACL\Contents\Product\Form
 */
class ProductFormGET{

    /**
     * @param $userLevel
     * @return ProductForm
     */
    public static function init($userLevel){

        $productForm = new ProductForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $productForm->remove('property_array');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $productForm;
    }

}

