<?php

/**
 * BranchFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchdepartment\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Branchdepartment\Form\BranchdepartmentForm;

/**
 * Class BranchFormPostPut
 * @package API\REST\V1\ACL\Company\Branch\Form
 */
class BranchdepartmentFormPostPut{

    /**
     * @param $userLevel
     * @return BranchForm
     */
    public static function init($userLevel){

        $branchForm = new BranchForm();

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

        return $branchForm;
    }

}