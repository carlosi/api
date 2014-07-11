<?php

namespace Company\ACL\Staff\Form;

use Company\ACL\Staff\Form\StaffForm;

class StaffFormGET
{
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