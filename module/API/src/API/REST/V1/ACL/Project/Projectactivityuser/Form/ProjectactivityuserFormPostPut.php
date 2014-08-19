<?php

/**
 * ProjectactivityuserFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivityuser\Form;

// - ACL - //
use API\REST\V1\ACL\Proyect\Projectactivityuser\Form\ProjectactivityuserForm;

/**
 * Class ProjectactivityuserFormPostPut
 * @package API\REST\V1\ACL\Proyect\Projectactivityuser\Form
 */
class ProjectactivityuserFormPostPut{

    /**
     * @param $userLevel
     * @return ProjectactivityuserForm
     */
    public static function init($userLevel){

        $ProjectactivityuserForm = new ProjectactivityuserForm();

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

        return $ProjectactivityuserForm;
    }

}

