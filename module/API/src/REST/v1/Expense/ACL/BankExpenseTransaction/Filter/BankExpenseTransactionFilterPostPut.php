<?php 

namespace REST\v1\Expense\ACL\BankExpenseTransaction\Filter;

use REST\v1\Expense\ACL\BankExpenseTransaction\Filter\BankExpenseTransactionFilter;


class ExpenseCategoryFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $bankExpenseTransactionFilter = new BankExpenseTransactionFilter();
        $inputFilter = $bankExpenseTransactionFilter->getInputFilter();
           
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

