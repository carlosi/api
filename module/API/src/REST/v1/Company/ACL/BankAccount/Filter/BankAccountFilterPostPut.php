<?php

namespace REST\v1\Company\ACL\BankAccount\Filter;

use REST\v1\Company\ACL\BankAccount\Filter\BankAccountFilter;


class BankAccountFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter($userLevel)
    {
        $bankAccountFilter = new BankAccountFilter();
        $inputFilter = $bankAccountFilter->getInputFilter();

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

