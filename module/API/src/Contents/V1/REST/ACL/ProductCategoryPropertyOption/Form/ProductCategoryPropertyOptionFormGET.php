<?php
namespace Contents\V1\REST\ACL\ProductCategoryPropertyOption\Form;

use Contents\V1\REST\ACL\ProductCategoryPropertyOption\Form\ProductCategoryPropertyOptionForm;

class ProductCategoryPropertyOptionFormGET{

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

                $productCategoryPropertyOptionForm->remove('productcategorypropertyoption_name');
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

