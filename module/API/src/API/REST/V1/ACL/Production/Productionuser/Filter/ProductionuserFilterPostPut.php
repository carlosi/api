<?php

/**
 * ProductionuserFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionuser\Filter;

// - ACL - //
use API\REST\V1\ACL\Production\Productionuser\Filter\ProductionuserFilter;

/**
 * Class ProductionuserFilterPostPut
 * @package API\REST\V1\ACL\Production\Productionuser\Filter
 */
class ProductionuserFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $ProductionuserFilter = new ProductionuserFilter();
        $inputFilter = $ProductionuserFilter->getInputFilter();
           
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

