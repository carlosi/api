<?php

namespace Sales\ACL\ProductCategoryProperty;

use Sales\ACL\ProductCategoryProperty\ProductCategoryPropertyForm;

class ProductCategoryPropertyFormGET
{
    public static function init($userlevel){

        $productCategoryPropertyForm = new ProductCategoryPropertyForm();

        switch($userlevel){

            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $productCategoryPropertyForm->remove('productcategoryproperty_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $productCategoryPropertyForm;
    }
} 