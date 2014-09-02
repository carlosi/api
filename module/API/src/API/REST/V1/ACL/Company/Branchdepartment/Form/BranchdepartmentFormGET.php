<?php

/**
 * BranchFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchdepartment\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Branchdepartment\Form\BranchdepartmentForm;

/**
 * Class BranchFormGET
 * @package API\REST\V1\ACL\Company\Branch\Form
 */
class BranchdepartmentFormGET
{
    /**
     * @param $userLevel
     * @return BranchForm
     */
    public static function init($userLevel){

        $branchForm = new BranchdepartmentForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $branchForm->remove('branch_address2');
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