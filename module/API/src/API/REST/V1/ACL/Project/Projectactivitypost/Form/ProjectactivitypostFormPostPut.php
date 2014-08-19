<?php

/**
 * ProjectactivitypostFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivitypost\Form;

// - ACL - //
use API\REST\V1\ACL\Proyect\Projectactivitypost\Form\ProjectactivitypostForm;

/**
 * Class ProjectactivitypostFormPostPut
 * @package API\REST\V1\ACL\Proyect\Projectactivitypost\Form
 */
class ProjectactivitypostFormPostPut{

    /**
     * @param $userLevel
     * @return ProjectactivitypostForm
     */
    public static function init($userLevel){

        $ProjectactivityForm = new ProjectactivitypostForm();

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

