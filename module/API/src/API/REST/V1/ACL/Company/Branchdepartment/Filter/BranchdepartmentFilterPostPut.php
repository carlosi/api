<?php

/**
 * BranchdepartmentFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchdepartment\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Branchdepartment\Filter\BranchdepartmentFilter;

/**
 * Class BranchdepartmentFilterPostPut
 * @package API\REST\V1\ACL\Company\Branchdepartment\Filter
 */
class BranchdepartmentFilterPostPut
{
    /**
     * @param InputFilterInterface $inputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $branchdepartmentFilter = new BranchdepartmentFilter();
        $inputFilter = $branchdepartmentFilter->getInputFilter();

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

