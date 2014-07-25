<?php 

namespace SATMexico\ACL\ClientTax\Filter;

use SATMexico\ACL\ClientTax\Filter\ClientTaxFilter;


class ClientTaxFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $clientTaxFilter = new ClientTaxFilter();
        $inputFilter = $clientTaxFilter->getInputFilter();
           
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

