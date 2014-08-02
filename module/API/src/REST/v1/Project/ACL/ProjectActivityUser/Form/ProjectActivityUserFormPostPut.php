<?php
namespace REST\v1\Project\ACL\ProjectActivityUser\Form;

use REST\v1\Project\ACL\ProjectActivityUser\Form\ProjectActivityUserForm;

class ProjectActivityUserFormPostPut{

    public static function init($userLevel){

        $projectActivityUserForm = new ProjectActivityUserForm();

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

        return $projectActivityUserForm;
    }

}

