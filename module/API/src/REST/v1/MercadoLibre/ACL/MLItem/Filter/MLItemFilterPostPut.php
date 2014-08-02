<?php

namespace REST\v1\MercadoLibre\ACL\MLItem\Filter;

use REST\v1\MercadoLibre\ACL\MLItem\Filter\MLItemFilter;

class MLItemFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $mlItemFilter = new MLItemFilter();
        $inputFilter = $mlItemFilter->getInputFilter();
           
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

