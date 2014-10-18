<?php

/**
 * TriggerprospectionFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospection\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionForm;

/**
 * Class TriggerprospectionFormGET
 * @package API\REST\V1\ACL\Salesforce\Triggerprospection\Form
 */
class TriggerprospectionFormGET
{
    /**
     * @param $userlevel
     * @return TriggerprospectionForm
     */
    public static function init($userlevel){

        $TriggerprospectionForm = new TriggerprospectionForm();

        switch ($userlevel){
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