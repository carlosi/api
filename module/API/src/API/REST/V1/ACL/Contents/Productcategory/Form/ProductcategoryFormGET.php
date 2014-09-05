<?php

/**
 * ProductcategoryFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productcategory\Form;

// - ACL - //
use API\REST\V1\ACL\Contents\Productcategory\Form\ProductcategoryForm;

/**
 * Class ProductcategoryFormGET
 * @package API\REST\V1\ACL\Contents\Productcategory\Form
 */
class ProductcategoryFormGET{

    /**
     * @param $userLevel
     * @return ProductcategoryForm
     */
    public static function init($userLevel){

        $ProductcategoryForm = new ProductcategoryForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $ProductcategoryForm->remove('Productcategory_dependency');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $ProductcategoryForm;
    }

}

