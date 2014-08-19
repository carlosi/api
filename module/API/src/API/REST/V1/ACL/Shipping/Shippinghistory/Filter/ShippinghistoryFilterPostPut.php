<?php

/**
 * ShippinghistoryFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Shipping\Shippinghistory\Filter;

// - ACL - //
use API\REST\V1\ACL\Shipping\Shippinghistory\Filter\ShippinghistoryFilter;

/**
 * Class ShippinghistoryFilterPostPut
 * @package API\REST\V1\ACL\Shipping\Shippinghistory\Filter
 */
class ShippinghistoryFilterPostPut
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
        $ShippinghistoryFilter = new ShippinghistoryFilter();
        $inputFilter = $ShippinghistoryFilter->getInputFilter();

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

