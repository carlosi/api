<?php
namespace Production\V1\REST\ACL\ProductionOrderItem\Form;

use Production\V1\REST\ACL\ProductionOrderItem\Form\ProductionOrderItemForm;

class ProductionOrderItemFormGET{

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

                $productionOrderItemForm->remove('productionorderitem_dateinit');
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

