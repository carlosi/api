<?php

/**
 * DepartmentFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Department\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Department\Filter\DepartmentFilter;

/**
 * Class DepartmentFilterPostPut
 * @package API\REST\V1\ACL\Company\Department\Filter
 */
class DepartmentFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $DepartmentFilter = new DepartmentFilter();
        $inputFilter = $DepartmentFilter->getInputFilter();
           
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

