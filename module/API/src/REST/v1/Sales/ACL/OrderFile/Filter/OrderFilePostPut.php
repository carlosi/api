<?php

namespace REST\v1\Sales\ACL\OrderFile\Filter;

use REST\v1\Sales\ACL\OrderFile\Filter\OrderFileFilter;


class OrderFileFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $orderFileFilter = new OrderFileFilter();
        $inputFilter = $orderFileFilter->getInputFilter();

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

