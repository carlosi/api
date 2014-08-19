<?php

/**
 * ProjectFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Project\Project\Form;

// - ACL - //
use API\REST\V1\ACL\Project\Project\Form\ProjectForm;

/**
 * Class ProjectFormGET
 * @package API\REST\V1\ACL\Project\Project\Form
 */
class ProjectFormGET
{
    /**
     * @param $userlevel
     * @return ProjectForm
     */
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