<?php

/**
 * ShippingFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Shipping\Shipping\Filter;

// - ACL - //
use API\REST\V1\ACL\Shipping\Shipping\Filter\ShippingFilter;

/**
 * Class ShippingFilterPostPut
 * @package API\REST\V1\ACL\Shipping\Shipping\Filter
 */
class ShippingFilterPostPut
{
    /**
     * @param InputFilterInterface $inputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $shippingFilter = new ShippingFilter();
        $inputFilter = $shippingFilter->getInputFilter();

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

