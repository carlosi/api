<?php

/**
 * UseraclFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Useracl\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Useracl\Form\UseraclForm;

/**
 * Class UseraclFormGET
 * @package API\REST\V1\ACL\Company\Useracl\Form
 */
class UseraclFormGET
{
    /**
     * @param $userlevel
     * @return UseraclForm
     */
    public static function init($userlevel){
        $UseraclForm = new UseraclForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $UseraclForm->remove('module_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $UseraclForm;
    }
}