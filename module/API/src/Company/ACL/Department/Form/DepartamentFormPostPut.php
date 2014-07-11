<?php
namespace Company\ACL\Departament\Form;

use Company\ACL\Departament\Form\DepartamentForm;

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

