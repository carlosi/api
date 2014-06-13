<?php
namespace Company\ACL\User;

use Company\ACL\User\UserForm;

class UserFormGET{

    public static function init($userLevel){

        $userForm = new UserForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $userForm->remove('user_password');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $userForm;
    }

}

