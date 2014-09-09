<?php

/**
 * BranchFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branch\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Branch\Form\BranchForm;

/**
 * Class BranchFormPostPut
 * @package API\REST\V1\ACL\Company\Branch\Form
 */
class BranchFormToShowUpdate{

    /**
     * @param $userLevel
     * @return BranchForm
     */
    public static function init($userLevel){

        $branchForm = new BranchForm();

        switch ($userLevel){

            case 5: {

                $branchForm->remove('idbranch');
                $branchForm->remove('idcompany');

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