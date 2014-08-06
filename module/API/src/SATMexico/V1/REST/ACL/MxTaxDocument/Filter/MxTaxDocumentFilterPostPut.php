<?php 

namespace SATMexico\V1\REST\ACL\MxTaxDocument\Filter;

use SATMexico\V1\REST\ACL\MxTaxDocument\Filter\MxTaxDocumentFilter;


class MxTaxDocumentFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $mxTaxDocumentFilter = new MxTaxDocumentFilter();
        $inputFilter = $mxTaxDocumentFilter->getInputFilter();
           
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

