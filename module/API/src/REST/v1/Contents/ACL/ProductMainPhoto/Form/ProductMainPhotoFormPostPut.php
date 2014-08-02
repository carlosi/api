<?php
namespace REST\v1\Contents\ACL\ProductMainPhoto\Form;

use REST\v1\Contents\ACL\ProductMainPhoto\Form\ProductMainPhotoForm;

class ProductMainPhotoFormPostPut{

    public static function init($userLevel){

        $productMainPhotoForm = new ProductMainPhotoForm();

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

        return $productMainPhotoForm;
    }

}

