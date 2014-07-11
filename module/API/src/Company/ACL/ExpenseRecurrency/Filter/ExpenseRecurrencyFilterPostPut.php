<?php 

namespace Company\ACL\ExpenseRecurrency\Filter;

use Company\ACL\ExpenseRecurrency\Filter\ExpenseRecurrencyFilter;


class ExpenseRecurrencyFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $expenseRecurrencyFilter = new ExpenseRecurrencyFilter();
        $inputFilter = $expenseRecurrencyFilter->getInputFilter();
           
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

