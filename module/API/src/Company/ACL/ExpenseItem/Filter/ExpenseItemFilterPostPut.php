<?php 

namespace Company\ACL\ExpenseItem\Filter;

use Company\ACL\ExpenseItem\Filter\ExpenseItemFilter;


class ExpenseItemFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $expenseItemFilter = new ExpenseItemFilter();
        $inputFilter = $expenseItemFilter->getInputFilter();
           
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

