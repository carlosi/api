<?php

/**
 * DepartmentFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Department\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Department\Form\DepartmentForm;

/**
 * Class DepartmentFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Department\Form
 */
class DepartmentFormToShowUpdate{

    /**
     * @param $userLevel
     * @return DepartmentForm
     */
    public static function init($userLevel){

        $DepartmentForm = new DepartmentForm();

        switch ($userLevel){

            case 5: {
                $DepartmentForm->remove('iddepartment');
                $DepartmentForm->remove('idcompany');

                break;
            }

            case 4: {
                $DepartmentForm->remove('iddepartment');
                $DepartmentForm->remove('idcompany');

                break;
            }

            case 3: {
                $DepartmentForm->remove('iddepartment');
                $DepartmentForm->remove('idcompany');
                break;
            }

            case 2: {
                $DepartmentForm->remove('iddepartment');
                $DepartmentForm->remove('idcompany');
                break;
            }

            case 1: {
                $DepartmentForm->remove('iddepartment');
                $DepartmentForm->remove('idcompany');
                break;
            }
        }

        return $DepartmentForm;
    }

}