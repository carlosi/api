<?php
namespace Company\V1\REST\ACL\DepartamentMember\Form;

use Company\V1\REST\ACL\DepartamentMember\Form\DepartamentMemberForm;

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

