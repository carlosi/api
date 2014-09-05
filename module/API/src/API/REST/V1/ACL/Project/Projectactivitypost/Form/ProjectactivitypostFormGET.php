<?php

/**
 * ProjectactivitypostFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivitypost\Form;

// - ACL - //
use API\REST\V1\ACL\Proyect\Projectactivitypost\Form\ProjectactivitypostForm;

/**
 * Class ProjectactivitypostFormGET
 * @package API\REST\V1\ACL\Proyect\Projectactivitypost\Form
 */
class ProjectactivitypostFormGET
{
    /**
     * @param $userlevel
     * @return ProjectactivitypostForm
     */
    public static function init($userlevel){
        $ProjectactivitypostForm = new ProjectactivitypostForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ProjectactivitypostForm->remove('iduser');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $ProjectactivitypostForm;
    }
}