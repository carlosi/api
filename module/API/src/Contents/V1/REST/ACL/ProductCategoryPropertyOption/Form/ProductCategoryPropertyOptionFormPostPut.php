<?php
namespace Contents\V1\REST\ACL\ProductCategoryPropertyOption\Form;

use Contents\V1\REST\ACL\ProductCategoryPropertyOption\Form\ProductCategoryPropertyOptionForm;

class ProductCategoryPropertyOptionFormPostPut{

    public static function init($userLevel){

        $productCategoryPropertyOptionForm = new ProductCategoryPropertyOptionForm();

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

        return $productCategoryPropertyOptionForm;
    }

}

