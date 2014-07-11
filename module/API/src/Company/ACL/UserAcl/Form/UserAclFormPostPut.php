<?php
namespace Company\ACL\UserAcl\Form;

use Company\ACL\UserAcl\Form\UserAclForm;

class UserAclFormPostPut{

    public static function init($userLevel){

        $userAclForm = new UserAclForm();

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

        return $userAclForm;
    }

}

