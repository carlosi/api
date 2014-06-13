<?php

namespace Sales\ACL\ProductCategory;

use Sales\ACL\ProductCategory\ProductCategoryForm;

class ProductCategoryFormGET
{
    public static function init($userlevel){

        $productCategoryForm = new ProductCategoryForm();

        switch($userlevel){

            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $productCategoryForm->remove('category_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $productCategoryForm;
    }
} 