<?php 

namespace SATMexico\ACL\MxTaxDocument\Filter;

use SATMexico\ACL\MxTaxDocument\Filter\MxTaxDocumentFilter;


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

