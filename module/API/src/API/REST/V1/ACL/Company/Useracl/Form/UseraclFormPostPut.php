<?php

/**
 * UseraclFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Useracl\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Useracl\Form\UseraclForm;

/**
 * Class UseraclFormPostPut
 * @package API\REST\V1\ACL\Company\Useracl\Form
 */
class UseraclFormPostPut{

    /**
     * @param $userLevel
     * @return UseraclForm
     */
    public static function init($userLevel){

        $UseraclForm = new UseraclForm();

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

        return $UseraclForm;
    }

}

