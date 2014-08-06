<?php

namespace Shipping\V1\REST\ACL\Shipping\Filter;

use Shipping\V1\REST\ACL\Shipping\Filter\ShippingFilter;


class ShippingFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter($userLevel)
    {
        $shippingFilter = new ShippingFilter();
        $inputFilter = $shippingFilter->getInputFilter();

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

