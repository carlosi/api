<?php

namespace Production\ACL\ProductionUser\Filter;

use Production\ACL\ProductionUser\Filter\ProductionUserFilter;

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

