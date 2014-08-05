<?php

namespace Contents\ACL\ProductMain\Filter;

use Contents\ACL\ProductMain\Filter\ProductMainFilter;

class ProductMainFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productMainFilter = new ProductMainFilter();
        $inputFilter = $productMainFilter->getInputFilter();
           
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

