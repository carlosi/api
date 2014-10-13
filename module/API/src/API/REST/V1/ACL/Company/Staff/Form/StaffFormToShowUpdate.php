<?php

/**
 * StaffFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 10/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Staff\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Staff\Form\StaffForm;

/**
 * Class StaffFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Staff\Form
 */
class StaffFormToShowUpdate{

    /**
     * @param $userLevel
     * @return StaffForm
     */
    public static function init($userLevel){

        $StaffForm = new StaffForm();

        switch ($userLevel){

            case 5: {
                $StaffForm->remove('idstaff');
                break;
            }

            case 4: {
                $StaffForm->remove('idstaff');


                break;
            }

            case 3: {
                $StaffForm->remove('idstaff');

                break;
            }

            case 2: {
                $StaffForm->remove('idstaff');

                break;
            }

            case 1: {
                $StaffForm->remove('idstaff');

                break;
            }
        }

        return $StaffForm;
    }

}