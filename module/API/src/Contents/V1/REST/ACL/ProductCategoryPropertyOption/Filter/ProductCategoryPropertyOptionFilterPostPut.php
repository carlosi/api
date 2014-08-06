<?php

namespace Contents\V1\REST\ACL\ProductCategoryPropertyOption\Filter;

use Contents\V1\REST\ACL\ProductCategoryPropertyOption\Filter\ProductCategoryPropertyOptionFilter;

class ProductCategoryPropertyFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productCategoryPropertyOptionFilter = new ProductCategoryPropertyOptionFilter();
        $inputFilter = $productCategoryPropertyOptionFilter->getInputFilter();
           
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

