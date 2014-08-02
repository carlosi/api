<?php 

namespace REST\v1\Expense\ACL\ExpenseCategory\Filter;

use REST\v1\Expense\ACL\ExpenseCategory\Filter\ExpenseCategoryFilter;


class ExpenseCategoryFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $expenseCategoryFilter = new ExpenseCategoryFilter();
        $inputFilter = $expenseCategoryFilter->getInputFilter();
           
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

