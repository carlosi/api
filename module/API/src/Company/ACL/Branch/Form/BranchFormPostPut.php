<?php
namespace Company\ACL\Branch\Form;

use Company\ACL\Branch\Form\BranchForm;

class BranchFormPostPut{

    public static function init($userLevel){

        $branchForm = new BranchForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $branchForm->remove('branch_address');

            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $branchForm;
    }

}