<?php

namespace Company\ACL\UserAcl;

use Company\ACL\UserAcl\UserAclForm;

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

                $userAclForm->remove('UserPassword');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

                break;
            }
        }
        return $userAclForm;
    }
}