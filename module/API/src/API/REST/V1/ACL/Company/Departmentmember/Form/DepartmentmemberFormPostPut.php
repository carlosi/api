<?php

/**
 * DepartmentmemberFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departmentmember\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Departmentmember\Form\DepartmentmemberForm;

/**
 * Class DepartmentmemberFormPostPut
 * @package API\REST\V1\ACL\Company\Departmentmember\Form
 */
class DepartmentmemberFormPostPut{

    /**
     * @param $userLevel
     * @return DepartmentmemberForm
     */
    public static function init($userLevel){

        $DepartmentmemberForm = new DepartmentmemberForm();

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

        return $DepartmentmemberForm;
    }

}

