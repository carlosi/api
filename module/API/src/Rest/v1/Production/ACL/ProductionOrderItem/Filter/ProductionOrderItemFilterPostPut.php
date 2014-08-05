<?php

namespace Production\ACL\ProductionOrderItem\Filter;

use Production\ACL\ProductionOrderItem\Filter\ProductionOrderItemFilter;

class ProductionOrderItemFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productionOrderItemFilter = new ProductionOrderItemFilter();
        $inputFilter = $productionOrderItemFilter->getInputFilter();
           
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

        return $inputFilter;
    }
}

?>

