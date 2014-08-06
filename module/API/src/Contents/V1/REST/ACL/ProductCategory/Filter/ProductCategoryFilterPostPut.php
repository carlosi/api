<?php

namespace Contents\V1\REST\ACL\ProductCategory\Filter;

use Contents\V1\REST\ACL\ProductCategory\Filter\ProductCategoryFilter;

class ProductCategoryFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productCategoryFilter = new ProductCategoryFilter();
        $inputFilter = $productCategoryFilter->getInputFilter();
           
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

