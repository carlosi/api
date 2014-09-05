<?php

/**
 * DepartmentleaderFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departmentleader\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderForm;

/**
 * Class DepartmentleaderFormGET
 * @package API\REST\V1\ACL\Company\Departmentleader\Form
 */
class DepartmentleaderFormGET
{
    /**
     * @param $userlevel
     * @return DepartmentleaderForm
     */
    public static function init($userlevel){
        $DepartmentleaderForm = new DepartmentleaderForm();

        switch($userlevel){
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
        return $DepartmentleaderForm;
    }
}