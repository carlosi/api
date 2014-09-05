<?php

/**
 * ExpensetransactionFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransaction\Filter;

// - ACL - //
use API\REST\V1\ACL\Expense\Expensetransaction\Filter\ExpensetransactionFilter;

/**
 * Class ExpensetransactionFilterPostPut
 * @package API\REST\V1\ACL\Expense\Expensetransaction\Filter
 */
class ExpensetransactionFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $ExpensetransactionFilter = new ExpensetransactionFilter();
        $inputFilter = $ExpensetransactionFilter->getInputFilter();
           
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

