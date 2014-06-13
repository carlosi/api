<?php

namespace Company\ACL\BranchUser;

use Company\ACL\BranchUser\BranchUserForm;

class BranchUserFormGET
{
    public static function init($userlevel){

        $branchUserForm = new BranchUserForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $branchUserForm->remove('idbranch');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $branchUserForm;
    }
}