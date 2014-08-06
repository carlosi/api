<?php
namespace Company\V1\REST\ACL\Departament\Form;

use Company\V1\REST\ACL\Departament\Form\DepartamentForm;

class DepartamentFormPostPut{

    public static function init($userLevel){

        $departamentForm = new DepartamentForm();

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

        return $departamentForm;
    }

}

