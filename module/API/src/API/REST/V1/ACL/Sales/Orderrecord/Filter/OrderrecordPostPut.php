<?php

/**
 * OrderrecordPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderrecord\Filter;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderrecord\Filter\OrderitemFilter;

/**
 * Class OrderrecordFilterPostPut
 * @package API\REST\V1\ACL\Sales\Orderrecord\Filter
 */
class OrderrecordFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $OrderrecordFilter = new OrderrecordFilter();
        $inputFilter = $OrderrecordFilter->getInputFilter();

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

