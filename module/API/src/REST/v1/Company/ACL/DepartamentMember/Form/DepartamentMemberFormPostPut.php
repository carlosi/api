<?php
namespace REST\v1\Company\ACL\DepartamentMember\Form;

use REST\v1\Company\ACL\DepartamentMember\Form\DepartamentMemberForm;

class DepartamentMemberFormPostPut{

    public static function init($userLevel){

        $departamentMemberForm = new DepartamentMemberForm();

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

        return $departamentMemberForm;
    }

}

