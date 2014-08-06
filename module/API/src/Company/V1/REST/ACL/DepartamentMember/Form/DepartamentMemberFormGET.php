<?php

namespace Company\V1\REST\ACL\DepartamentMember\Form;

use Company\V1\REST\ACL\DepartamentMember\Form\DepartamentMemberForm;

class DepartamentMemberFormGET
{
    public static function init($userlevel){
        $departamentMemberForm = new DepartamentMemberForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $departamentMemberForm->remove('iddepartament');
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