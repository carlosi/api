<?php

namespace Production\V1\REST\ACL\ProductionUser\Filter;

use Production\V1\REST\ACL\ProductionUser\Filter\ProductionUserFilter;

class ProductionUserFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productionUserFilter = new ProductionUserFilter();
        $inputFilter = $productionUserFilter->getInputFilter();
           
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

