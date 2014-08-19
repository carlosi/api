<?php

/**
 * BranchFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branch\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Branch\Form\BranchForm;

/**
 * Class BranchFormGET
 * @package API\REST\V1\ACL\Company\Branch\Form
 */
class BranchFormGET
{
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