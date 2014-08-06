<?php 

namespace Expense\V1\REST\ACL\ExpenseTransaction\Filter;

use Expense\V1\REST\ACL\ExpenseTransaction\Filter\ExpenseTransactionFilter;


class ExpenseTransactionFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $expenseTransactionFilter = new ExpenseTransactionFilter();
        $inputFilter = $expenseTransactionFilter->getInputFilter();
           
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

