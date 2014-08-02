<?php
namespace REST\v1\Contents\ACL\Product\Form;

use REST\v1\Contents\ACL\Product\Form\ProductForm;

class ProductFormGET{

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

