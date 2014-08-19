<?php

/**
 * ProjectactivityuserFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivityuser\Form;

// - ACL - //
use API\REST\V1\ACL\Proyect\Projectactivityuser\Form\ProjectactivityuserForm;

/**
 * Class ProjectactivityuserFormGET
 * @package API\REST\V1\ACL\Proyect\Projectactivityuser\Form
 */
class ProjectactivityuserFormGET
{
    /**
     * @param $userlevel
     * @return ProjectactivityuserForm
     */
    public static function init($userlevel){
        $ProjectactivityuserForm = new ProjectactivityuserForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ProjectactivityuserForm->remove('iduser');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $ProjectactivityuserForm;
    }
}