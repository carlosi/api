<?php

/**
 * StaffFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Staff\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Staff\Form\StaffForm;

/**
 * Class StaffFormPostPut
 * @package API\REST\V1\ACL\Company\Staff\Form
 */
class StaffFormPostPut{

    /**
     * @param $userLevel
     * @return StaffForm
     */
    public static function init($userLevel){

        $staffForm = new StaffForm();

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

        return $staffForm;
    }

}

