<?php
namespace REST\v1\Contents\ACL\ProductCategoryProperty\Form;

use REST\v1\Contents\ACL\ProductCategoryProperty\Form\ProductCategoryPropertyForm;

class ProductCategoryPropertyFormGET{

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

