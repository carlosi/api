<?php
namespace Project\ACL\Project\Form;

use Project\ACL\Project\Form\ProjectForm;

class ProjectFormPostPut{

    public static function init($userLevel){

        $projectForm = new ProjectForm();

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

        return $projectForm;
    }

}

