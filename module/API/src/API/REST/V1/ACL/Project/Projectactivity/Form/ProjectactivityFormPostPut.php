<?php

/**
 * ProjectactivityFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivity\Form;

// - ACL - //
use API\REST\V1\ACL\Proyect\Projectactivity\Form\ProjectactivityForm;

/**
 * Class ProjectactivityFormPostPut
 * @package API\REST\V1\ACL\Proyect\Projectactivity\Form
 */
class ProjectactivityFormPostPut{

    /**
     * @param $userLevel
     * @return ProjectactivityForm
     */
    public static function init($userLevel){

        $ProjectactivityForm = new ProjectactivityForm();

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

        return $ProjectactivityForm;
    }

}

