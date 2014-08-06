<?php

namespace Sales\V1\REST\ACL\OrderRecord\Filter;

use Sales\V1\REST\ACL\OrderRecord\Filter\OrderItemFilter;


class OrderRecordFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $orderRecordFilter = new OrderRecordFilter();
        $inputFilter = $orderRecordFilter->getInputFilter();

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

