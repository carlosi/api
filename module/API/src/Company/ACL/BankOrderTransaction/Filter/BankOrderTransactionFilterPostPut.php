<?php

namespace Company\ACL\BankOrderTransaction\Filter;

use Company\ACL\BankOrderTransaction\Filter\BankOrderTransactionFilter;


class BankOrderTransactionFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

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

