<?php

namespace Company\V1\REST\ACL\Departament\Form;

use Company\V1\REST\ACL\Departament\Form\DepartamentForm;

class DepartamentFormGET
{
    public static function init($userlevel){
        $departamentForm = new DepartamentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $departamentForm->remove('departament_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $departamentForm;
    }
}