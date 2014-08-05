<?php 

namespace SATMexico\ACL\MxTaxInfo\Filter;

use SATMexico\ACL\MxTaxInfo\Filter\MxTaxInfoFilter;


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

