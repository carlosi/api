<?php

/**
 * ProjectFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Project\Project\Form;

// - ACL - //
use API\REST\V1\ACL\Project\Project\Form\ProjectForm;

/**
 * Class ProjectFormPostPut
 * @package API\REST\V1\ACL\Project\Project\Form
 */
class ProjectFormPostPut{

    /**
     * @param $userLevel
     * @return ProjectForm
     */
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

