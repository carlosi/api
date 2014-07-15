<?php

namespace Production\ACL\ProductionTeam\Filter;

use Production\ACL\ProductionTeam\Filter\ProductionTeamFilter;

class ProductionTeamFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $productionTeamFilter = new ProductionTeamFilter();
        $inputFilter = $productionTeamFilter->getInputFilter();
           
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

