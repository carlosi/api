<?php

namespace Production\V1\REST\ACL\ProductionStatus\Filter;

use Production\V1\REST\ACL\ProductionStatus\Filter\ProductionStatusFilter;

class ProductionStatusFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productionStatusFilter = new ProductionStatusFilter();
        $inputFilter = $productionStatusFilter->getInputFilter();
           
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

