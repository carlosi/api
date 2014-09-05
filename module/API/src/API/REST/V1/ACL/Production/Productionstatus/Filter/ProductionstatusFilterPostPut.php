<?php

/**
 * ProductionstatusFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionstatus\Filter;

// - ACL - //
use API\REST\V1\ACL\Production\Productionstatus\Filter\ProductionstatusFilter;

/**
 * Class ProductionstatusFilterPostPut
 * @package API\REST\V1\ACL\Production\Productionstatus\Filter
 */
class ProductionstatusFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $ProductionstatusFilter = new ProductionstatusFilter();
        $inputFilter = $ProductionstatusFilter->getInputFilter();
           
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

