<?php

namespace REST\v1\Project\ACL\ProjectActivity\Form;

use REST\v1\Project\ACL\ProjectActivity\Form\ProjectActivityForm;

class ProjectActivityFormGET
{
    public static function init($userlevel){
        $projectActivityForm = new ProjectActivityForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $projectActivityForm->remove('projectactivity_description');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $projectActivityForm;
    }
}