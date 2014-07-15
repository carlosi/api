<?php

namespace Contents\ACL\ProductCategoryProperty\Filter;

use Contents\ACL\ProductCategoryProperty\Filter\ProductCategoryPropertyFilter;

class ProductCategoryPropertyFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productCategoryPropertyFilter = new ProductCategoryPropertyFilter();
        $inputFilter = $productCategoryPropertyFilter->getInputFilter();
           
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

