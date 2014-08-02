<?php

namespace REST\v1\Sales\ACL\OrderItem\Filter;

use REST\v1\Sales\ACL\OrderItem\Filter\OrderItemFilter;


class OrderItemFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $orderItemFilter = new OrderItemFilter();
        $inputFilter = $orderItemFilter->getInputFilter();

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

