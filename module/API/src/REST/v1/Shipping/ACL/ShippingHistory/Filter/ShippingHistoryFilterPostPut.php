<?php

namespace REST\v1\Shipping\ACL\ShippingHistory\Filter;

use REST\v1\Shipping\ACL\ShippingHistory\Filter\ShippingHistoryFilter;


class ShippingHistoryFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter($userLevel)
    {
        $shippingHistoryFilter = new ShippingHistoryFilter();
        $inputFilter = $shippingHistoryFilter->getInputFilter();

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

