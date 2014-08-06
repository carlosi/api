<?php
namespace Company\V1\REST\ACL\Branch\Form;

use Company\V1\REST\ACL\Branch\Form\BranchForm;

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

                break;
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