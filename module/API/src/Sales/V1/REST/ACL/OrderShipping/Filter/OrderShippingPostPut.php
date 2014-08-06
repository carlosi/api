<?php

namespace Sales\V1\REST\ACL\OrderShipping\Filter;

use Sales\V1\REST\ACL\OrderShipping\Filter\OrderShippingFilter;

class OrderShippingFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $orderShippingFilter = new OrderShippingFilter();
        $inputFilter = $orderShippingFilter->getInputFilter();

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

