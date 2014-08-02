<?php
namespace REST\v1\Contents\ACL\ProductCategory\Form;

use REST\v1\Contents\ACL\ProductCategory\Form\ProductCategoryForm;

class ProductCategoryFormGET{

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

                $productCategoryForm->remove('productcategory_dependency');
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

