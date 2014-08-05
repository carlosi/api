<?php

namespace Project\ACL\ProjectActivityUser\Form;

use Project\ACL\ProjectActivityUser\Form\ProjectActivityUserForm;

class ProjectActivityUserFormGET
{
    public static function init($userlevel){
        $projectActivityUserForm = new ProjectActivityUserForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $projectActivityUserForm->remove('iduser');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $projectActivityUserForm;
    }
}