<?php

namespace Sales\V1\REST\ACL\Order\Filter;

use Sales\V1\REST\ACL\Order\Filter\OrderFilter;


class OrderFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $orderFilter = new OrderFilter();
        $inputFilter = $orderFilter->getInputFilter();

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

