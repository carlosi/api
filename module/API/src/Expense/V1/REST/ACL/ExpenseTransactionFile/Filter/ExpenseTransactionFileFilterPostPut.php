<?php 

namespace Expense\V1\REST\ACL\ExpenseTransactionFile\Filter;

use Expense\V1\REST\ACL\ExpenseTransactionFile\Filter\ExpenseTransactionFileFilter;


class ExpenseTransactionFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $expenseTransactionFileFilter = new ExpenseTransactionFileFilter();
        $inputFilter = $expenseTransactionFileFilter->getInputFilter();
           
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

