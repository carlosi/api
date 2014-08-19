<?php

/**
 * OrderitemPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Sales\Orderitem\Filter;

// - ACL - //
use API\REST\V1\ACL\Sales\Orderitem\Filter\OrderitemFilter;

/**
 * Class OrderitemFilterPostPut
 * @package API\REST\V1\ACL\Sales\Orderitem\Filter
 */
class OrderitemFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $OrderitemFilter = new OrderitemFilter();
        $inputFilter = $OrderitemFilter->getInputFilter();

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

