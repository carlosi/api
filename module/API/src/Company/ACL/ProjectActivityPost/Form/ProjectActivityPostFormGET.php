<?php

namespace Company\ACL\ProjectActivityPost\Form;

use Company\ACL\ProjectActivityPost\Form\ProjectActivityPostForm;

class ProjectActivityPostFormGET
{
    public static function init($userlevel){
        $projectActivityPostForm = new ProjectActivityPostForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $projectActivityPostForm->remove('iduser');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $projectActivityPostForm;
    }
}