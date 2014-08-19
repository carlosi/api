<?php

/**
 * OrdershippingPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Ordershipping\Filter;

// - ACL - //
use API\REST\V1\ACL\Sales\Ordershipping\Filter\OrdershippingFilter;

/**
 * Class OrdershippingFilterPostPut
 * @package API\REST\V1\ACL\Sales\Ordershipping\Filter
 */
class OrdershippingFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $OrdershippingFilter = new OrdershippingFilter();
        $inputFilter = $OrdershippingFilter->getInputFilter();

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

