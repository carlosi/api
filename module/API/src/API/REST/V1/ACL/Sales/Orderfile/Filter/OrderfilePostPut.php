<?php

/**
 * OrderfilePostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderfile\Filter;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderfile\Filter\OrderfileFilter;

/**
 * Class OrderfileFilterPostPut
 * @package API\REST\V1\ACL\Sales\Orderfile\Filter
 */
class OrderfileFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $OrderfileFilter = new OrderfileFilter();
        $inputFilter = $OrderfileFilter->getInputFilter();

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

