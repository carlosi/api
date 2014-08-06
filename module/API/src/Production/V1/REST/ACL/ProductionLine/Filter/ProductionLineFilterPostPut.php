<?php

namespace Production\V1\REST\ACL\ProductionLine\Filter;

use Production\V1\REST\ACL\ProductionLine\Filter\ProductionLineFilter;

class ProductionLineFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productionLineFilter = new ProductionLineFilter();
        $inputFilter = $productionLineFilter->getInputFilter();
           
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

