<?php
namespace Contents\V1\REST\ACL\ProductMain\Form;

use Contents\V1\REST\ACL\ProductMain\Form\ProductMainForm;

class ProductMainFormPostPut{

    public static function init($userLevel){

        $productMainForm = new ProductMainForm();

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

        return $productMainForm;
    }

}

