<?php

namespace Contents\ACL\ProductMain;

use Contents\ACL\ProductMain\ProductMainForm;

class ProductMainFormGET{
    public static function init($userlevel){
        $productMainForm = new ProductMainForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $productMainForm->remove('productmain_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $productMainForm;
    }
}