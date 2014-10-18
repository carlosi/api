<?php

/**
 * TriggerprospectionuserFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospectionuser\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Triggerprospectionuser\Form\TriggerprospectionuserForm;

/**
 * Class TriggerprospectionuserFormGET
 * @package API\REST\V1\ACL\Salesforce\Triggerprospectionuser\Form
 */
class TriggerprospectionuserFormGET
{
    /**
     * @param $userlevel
     * @return TriggerprospectionuserForm
     */
    public static function init($userlevel){

        $TriggerprospectionuserForm = new TriggerprospectionuserForm();

        switch ($userlevel){
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