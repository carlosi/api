<?php
namespace Contents\ACL\ProductCategoryProperty\Form;

use Contents\ACL\ProductCategoryProperty\Form\ProductCategoryPropertyForm;

class ProductCategoryPropertyFormPostPut{

    public static function init($userLevel){

        $productCategoryPropertyForm = new ProductCategoryPropertyForm();

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

        return $productCategoryPropertyForm;
    }

}

