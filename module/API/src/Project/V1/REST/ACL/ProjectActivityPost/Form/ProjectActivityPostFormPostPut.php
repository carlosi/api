<?php
namespace Project\V1\REST\ACL\ProjectActivityPost\Form;

use Project\V1\REST\ACL\ProjectActivityPost\Form\ProjectActivityPostForm;

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

