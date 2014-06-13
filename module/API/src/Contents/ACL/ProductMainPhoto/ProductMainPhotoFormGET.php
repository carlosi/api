<?php

namespace Contents\ACL\ProductMainPhoto;

use Contents\ACL\ProductMain\ProductMainForm;
use Contents\ACL\ProductMainPhoto\ProductMainPhotoForm;

class ProductMainPhotoFormGET
{
    public static function init($userlevel){

        $productMainPhotoForm = new ProductMainPhotoForm();

        switch($userlevel){
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