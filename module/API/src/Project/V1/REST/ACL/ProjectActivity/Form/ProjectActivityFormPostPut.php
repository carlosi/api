<?php
namespace Project\V1\REST\ACL\ProjectActivity\Form;

use Project\V1\REST\ACL\ProjectActivity\Form\ProjectActivityForm;

class ProjectActivityFormPostPut{

    public static function init($userLevel){

        $projectActivityForm = new ProjectActivityForm();

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

        return $projectActivityForm;
    }

}

