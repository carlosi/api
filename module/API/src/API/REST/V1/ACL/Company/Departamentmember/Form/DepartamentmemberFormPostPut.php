<?php

/**
 * DepartamentmemberFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departamentmember\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Departamentmember\Form\DepartamentmemberForm;

/**
 * Class DepartamentmemberFormPostPut
 * @package API\REST\V1\ACL\Company\Departamentmember\Form
 */
class DepartamentmemberFormPostPut{

    /**
     * @param $userLevel
     * @return DepartamentmemberForm
     */
    public static function init($userLevel){

        $DepartamentmemberForm = new DepartamentmemberForm();

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

        return $DepartamentmemberForm;
    }

}

