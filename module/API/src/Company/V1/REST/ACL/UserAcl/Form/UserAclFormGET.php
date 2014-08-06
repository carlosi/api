<?php

namespace Company\V1\REST\ACL\UserAcl\Form;

use Company\V1\REST\ACL\UserAcl\Form\UserAclForm;

class UserAclFormGET
{
    public static function init($userlevel){
        $userAclForm = new UserAclForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $userAclForm->remove('module_name');
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