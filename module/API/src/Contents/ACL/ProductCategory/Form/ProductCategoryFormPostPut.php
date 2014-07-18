<?php
namespace Contents\ACL\ProductCategory\Form;

use Contents\ACL\ProductCategory\Form\ProductCategoryForm;

class ProductCategoryFormPostPut{

    public static function init($userLevel){

        $productCategoryForm = new ProductCategoryForm();

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

        return $productCategoryForm;
    }

}

