<?php

/**
 * DepartmentFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Department\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Department\Form\DepartmentForm;

/**
 * Class DepartmentFormPostPut
 * @package API\REST\V1\ACL\Company\Department\Form
 */
class DepartmentFormPostPut{

    /**
     * @param $userLevel
     * @return DepartmentForm
     */
    public static function init($userLevel){

        $DepartmentForm = new DepartmentForm();

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

        return $DepartmentForm;
    }

}

