<?php

/**
 * DepartamentmemberFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departamentmember\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Departamentmember\Form\DepartamentmemberForm;

/**
 * Class DepartamentmemberFormGET
 * @package API\REST\V1\ACL\Company\Departamentmember\Form
 */
class DepartamentmemberFormGET
{
    /**
     * @param $userlevel
     * @return DepartamentmemberForm
     */
    public static function init($userlevel){
        $DepartamentmemberForm = new DepartamentmemberForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $DepartamentmemberForm->remove('iddepartament');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $DepartamentmemberForm;
    }
}