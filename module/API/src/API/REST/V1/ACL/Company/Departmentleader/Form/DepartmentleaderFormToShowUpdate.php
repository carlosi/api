<?php

/**
 * DepartmentleaderFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 08/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departmentleader\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderForm;

/**
 * Class DepartmentleaderFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Departmentleader\Form
 */
class DepartmentleaderFormToShowUpdate{

    /**
     * @param $userLevel
     * @return DepartmentleaderForm
     */
    public static function init($userLevel){

        $DepartmentleaderForm = new DepartmentleaderForm();

        switch ($userLevel){

            case 5: {
                $DepartmentleaderForm->remove('iddepartmentleader');
                break;
            }

            case 4: {
                $DepartmentleaderForm->remove('iddepartmentleader');


                break;
            }

            case 3: {
                $DepartmentleaderForm->remove('iddepartmentleader');

                break;
            }

            case 2: {
                $DepartmentleaderForm->remove('iddepartmentleader');

                break;
            }

            case 1: {
                $DepartmentleaderForm->remove('iddepartmentleader');

                break;
            }
        }

        return $DepartmentleaderForm;
    }

}