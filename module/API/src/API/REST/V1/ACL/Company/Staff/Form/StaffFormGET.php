<?php

/**
 * StaffFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Staff\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Staff\Form\StaffForm;

/**
 * Class StaffFormGET
 * @package API\REST\V1\ACL\Company\Staff\Form
 */
class StaffFormGET
{
    /**
     * @param $userlevel
     * @return StaffForm
     */
    public static function init($userlevel){
        $staffForm = new StaffForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $staffForm->remove('iduser');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $staffForm;
    }
}