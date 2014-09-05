<?php

/**
 * ProductionorderitemFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionorderitem\Filter;

// - ACL - //
use API\REST\V1\ACL\Production\Productionorderitem\Filter\ProductionorderitemFilter;

/**
 * Class ProductionOrderitemFilterPostPut
 * @package API\REST\V1\ACL\Production\Productionorderitem\Filter
 */
class ProductionorderitemFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $ProductionorderitemFilter = new ProductionorderitemFilter();
        $inputFilter = $ProductionorderitemFilter->getInputFilter();
           
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

