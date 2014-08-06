<?php
namespace Company\ACL\Staff\Form;

use Company\ACL\Staff\Form\StaffForm;

class StaffFormPostPut{

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

