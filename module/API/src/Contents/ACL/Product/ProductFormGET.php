<?php

namespace Contents\ACL\Product;

use Contents\ACL\Product\ProductForm;

class ProductFormGET
{
    public static function init($userlevel){
        $productForm = new ProductForm();

        switch($userlevel){
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