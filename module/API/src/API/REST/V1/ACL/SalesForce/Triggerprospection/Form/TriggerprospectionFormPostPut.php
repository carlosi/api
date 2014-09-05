<?php

/**
 * TriggerprospectionFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Triggerprospection\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Triggerprospection\Form\TriggerprospectionForm;

/**
 * Class TriggerprospectionFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Triggerprospection\Form
 */
class TriggerprospectionFormPostPut{

    /**
     * @param $userLevel
     * @return TriggerprospectionForm
     */
    public static function init($userLevel){

        $TriggerprospectionForm = new TriggerprospectionForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $TriggerprospectionForm->remove('triggerprospection_date');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $TriggerprospectionForm;
    }

}