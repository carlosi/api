<?php
namespace Production\V1\REST\ACL\ProductionStatus\Form;

use Production\V1\REST\ACL\ProductionStatus\Form\ProductionStatusForm;

class ProductionStatusFormPostPut{

    public static function init($userLevel){

        $productionStatusForm = new ProductionStatusForm();

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

        return $productionStatusForm;
    }

}

