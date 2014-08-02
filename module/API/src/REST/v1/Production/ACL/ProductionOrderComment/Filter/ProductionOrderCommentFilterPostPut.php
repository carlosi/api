<?php

namespace REST\v1\Production\ACL\ProductionOrderComment\Filter;

use REST\v1\Production\ACL\ProductionOrderComment\Filter\ProductionOrderCommentFilter;

class ProductionOrderCommentFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productionOrderCommentFilter = new ProductionOrderCommentFilter();
        $inputFilter = $productionOrderCommentFilter->getInputFilter();
           
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

