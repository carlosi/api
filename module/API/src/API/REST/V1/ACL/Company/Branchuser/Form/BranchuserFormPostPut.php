<?php

/**
 * BranchuserFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchuser\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Branchuser\Form\BranchuserForm;

/**
 * Class BranchuserFormPostPut
 * @package API\REST\V1\ACL\Company\Branchuser\Form
 */
class BranchuserFormPostPut{

    /**
     * @param $userLevel
     * @return BranchuserForm
     */
    public static function init($userLevel){

        $BranchuserForm = new BranchuserForm();

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

        return $BranchuserForm;
    }

}