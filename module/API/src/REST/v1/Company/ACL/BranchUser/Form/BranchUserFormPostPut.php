<?php
namespace REST\v1\Company\ACL\BranchUser\Form;

use REST\v1\Company\ACL\BranchUser\Form\BranchUserForm;

class BranchUserFormPostPut{

    public static function init($userLevel){

        $branchUserForm = new BranchUserForm();

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

        return $branchUserForm;
    }

}