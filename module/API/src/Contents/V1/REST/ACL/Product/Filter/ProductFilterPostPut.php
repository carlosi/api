<?php

namespace Contents\V1\REST\ACL\Product\Filter;

use Contents\V1\REST\ACL\Product\Filter\ProductFilter;

class ProductFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productFilter = new ProductFilter();
        $inputFilter = $productFilter->getInputFilter();
           
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

