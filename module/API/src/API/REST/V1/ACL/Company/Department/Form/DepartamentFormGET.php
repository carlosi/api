<?php

/**
 * DepartamentFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departament\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Departament\Form\DepartamentForm;

/**
 * Class DepartamentFormGET
 * @package API\REST\V1\ACL\Company\Departament\Form
 */
class DepartamentFormGET
{
    /**
     * @param $userlevel
     * @return DepartamentForm
     */
    public static function init($userlevel){
        $departamentForm = new DepartamentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $departamentForm->remove('departament_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $departamentForm;
    }
}