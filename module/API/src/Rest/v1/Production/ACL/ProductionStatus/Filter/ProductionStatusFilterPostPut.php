<?php

namespace Production\ACL\ProductionStatus\Filter;

use Production\ACL\ProductionStatus\Filter\ProductionStatusFilter;

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

