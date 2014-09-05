<?php

/**
 * ProjectactivityFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivity\Form;

// - ACL - //
use API\REST\V1\ACL\Proyect\Projectactivity\Form\ProjectactivityForm;

/**
 * Class ProjectactivityFormGET
 * @package API\REST\V1\ACL\Proyect\Projectactivity\Form
 */
class ProjectactivityFormGET
{
    /**
     * @param $userlevel
     * @return ProjectactivityForm
     */
    public static function init($userlevel){
        $ProjectactivityForm = new ProjectactivityForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ProjectactivityForm->remove('Projectactivity_description');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $ProjectactivityForm;
    }
}