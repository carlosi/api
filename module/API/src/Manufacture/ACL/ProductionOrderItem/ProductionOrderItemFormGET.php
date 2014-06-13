<?php

namespace Manufacture\ACL\ProductionOrderItem;

use Manufacture\ACL\ProductionOrderItem\ProductionOrderItemForm;

class ProductionOrderItemFormGET{

    public static function init($userlevel){

        $productionOrderItemForm = new ProductionOrderItemForm();

        switch($userlevel){
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