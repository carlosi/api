<?php

namespace REST\v1\Sales\ACL\BankOrderTransaction\Filter;

use REST\v1\Sales\ACL\BankOrderTransaction\Filter\BankOrderTransactionFilter;


class BankOrderTransactionFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $bankOrderTransactionFilter = new BankOrderTransactionFilter();
        $inputFilter = $bankOrderTransactionFilter->getInputFilter();

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

