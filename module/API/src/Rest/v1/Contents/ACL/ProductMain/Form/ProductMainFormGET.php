<?php
namespace Contents\ACL\ProductMain\Form;

use Contents\ACL\ProductMain\Form\ProductMainForm;

class ProductMainFormGET{

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

                $productMainForm->remove('productmain_eachpieces');
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

