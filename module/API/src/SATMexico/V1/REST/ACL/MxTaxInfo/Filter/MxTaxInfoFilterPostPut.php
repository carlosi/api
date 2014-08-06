<?php 

namespace SATMexico\V1\REST\ACL\MxTaxInfo\Filter;

use SATMexico\V1\REST\ACL\MxTaxInfo\Filter\MxTaxInfoFilter;


class MxTaxInfoFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $mxTaxInfoFilter = new MxTaxInfoFilter();
        $inputFilter = $mxTaxInfoFilter->getInputFilter();
           
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

