<?php

/**
 * DepartmentFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Department\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Department\Form\DepartmentForm;

/**
 * Class DepartmentFormGET
 * @package API\REST\V1\ACL\Company\Department\Form
 */
class DepartmentFormGET
{
    /**
     * @param $userlevel
     * @return DepartmentForm
     */
    public static function init($userlevel){
        $DepartmentForm = new DepartmentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $DepartmentForm->remove('Department_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $DepartmentForm;
    }
}