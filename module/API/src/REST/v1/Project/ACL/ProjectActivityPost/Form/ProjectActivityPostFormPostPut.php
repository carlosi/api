<?php
namespace REST\v1\Project\ACL\ProjectActivityPost\Form;

use REST\v1\Project\ACL\ProjectActivityPost\Form\ProjectActivityPostForm;

class ProjectActivityPostFormPostPut{

    public static function init($userLevel){

        $projectActivityForm = new ProjectActivityPostForm();

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

