<?php

namespace Company\ACL\Project\Form;

use Company\ACL\Project\Form\ProjectForm;

class ProjectFormGET
{
    public static function init($userlevel){
        $projectForm = new ProjectForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $projectForm->remove('project_name');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $projectForm;
    }
}