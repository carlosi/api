<?php
namespace Contents\V1\REST\ACL\Product\Form;

use Contents\V1\REST\ACL\Product\Form\ProductForm;

class ProductFormPostPut{

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

