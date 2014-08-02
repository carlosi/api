<?php
namespace REST\v1\Production\ACL\ProductionOrderItem\Form;

use REST\v1\Production\ACL\ProductionOrderItem\Form\ProductionOrderItemForm;

class ProductionOrderItemFormPostPut{

    public static function init($userLevel){

        $productionOrderItemForm = new ProductionOrderItemForm();

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

        return $productionOrderItemForm;
    }

}

