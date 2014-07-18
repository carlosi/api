<?php
namespace Contents\ACL\ProductMainPhoto\Form;

use Contents\ACL\ProductMainPhoto\Form\ProductMainPhotoForm;

class ProductMainPhotoFormGET{

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

                $productMainPhotoForm->remove('productmainphoto_width');
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

