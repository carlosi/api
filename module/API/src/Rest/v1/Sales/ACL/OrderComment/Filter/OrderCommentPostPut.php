<?php

namespace Sales\ACL\OrderComment\Filter;

use Sales\ACL\OrderComment\Filter\OrderCommentFilter;


class OrderCommentFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $orderCommentFilter = new OrderCommentFilter();
        $inputFilter = $orderCommentFilter->getInputFilter();

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

