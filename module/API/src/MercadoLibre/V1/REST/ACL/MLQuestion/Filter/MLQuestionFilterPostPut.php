<?php

namespace MercadoLibre\V1\REST\ACL\MLQuestion\Filter;

use MercadoLibre\V1\REST\ACL\MLQuestion\Filter\MLQuestionFilter;

class MLQuestionFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $mlQuestionFilter = new MLQuestionFilter();
        $inputFilter = $mlQuestionFilter->getInputFilter();
           
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

