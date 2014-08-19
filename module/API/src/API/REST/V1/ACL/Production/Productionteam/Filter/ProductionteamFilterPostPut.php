<?php

/**
 * ProductionteamFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionteam\Filter;

// - ACL - //
use API\REST\V1\ACL\Production\Productionteam\Filter\ProductionteamFilter;

/**
 * Class ProductionteamFilterPostPut
 * @package API\REST\V1\ACL\Production\Productionteam\Filter
 */
class ProductionteamFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $ProductionteamFilter = new ProductionteamFilter();
        $inputFilter = $ProductionteamFilter->getInputFilter();
           
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

