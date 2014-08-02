<?php
namespace REST\v1\Production\ACL\ProductionLine\Form;

use REST\v1\Production\ACL\ProductionLine\Form\ProductionLineForm;

class ProductionLineFormPostPut{

    public static function init($userLevel){

        $productionLineForm = new ProductionLineForm();

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

        return $productionLineForm;
    }

}

