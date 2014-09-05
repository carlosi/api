<?php

/**
 * TriggerprospectionuserFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Triggerprospectionuser\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Triggerprospectionuser\Form\TriggerprospectionuserForm;

/**
 * Class TriggerprospectionuserFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Triggerprospectionuser\Form
 */
class TriggerprospectionuserFormPostPut{

    /**
     * @param $userLevel
     * @return TriggerprospectionuserForm
     */
    public static function init($userLevel){

        $TriggerprospectionuserForm = new TriggerprospectionuserForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $TriggerprospectionuserForm->remove('idtriggerprospection');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $TriggerprospectionuserForm;
    }

}