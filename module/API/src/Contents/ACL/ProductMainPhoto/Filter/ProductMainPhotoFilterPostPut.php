<?php

namespace Contents\ACL\ProductMainPhoto\Filter;

use Contents\ACL\ProductMainPhoto\Filter\ProductMainPhotoFilter;

class ProductMainPhotoFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productMainPhotoFilter = new ProductMainPhotoFilter();
        $inputFilter = $productMainPhotoFilter->getInputFilter();
           
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

