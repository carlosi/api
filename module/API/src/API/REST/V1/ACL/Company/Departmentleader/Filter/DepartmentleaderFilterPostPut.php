<?php

/**
 * DepartmentleaderFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departmentleader\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Departmentleader\Filter\DepartmentleaderFilter;

/**
 * Class DepartmentleaderFilterPostPut
 * @package API\REST\V1\ACL\Company\Departmentleader\Filter
 */
class DepartmentleaderFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $DepartmentleaderFilter = new DepartmentleaderFilter();
        $inputFilter = $DepartmentleaderFilter->getInputFilter();

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

