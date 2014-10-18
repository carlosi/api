<?php

/**
 * TriggerprospectionnoteFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form\TriggerprospectionnoteForm;

/**
 * Class TriggerprospectionnoteFormGET
 * @package API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form
 */
class TriggerprospectionnoteFormGET
{
    /**
     * @param $userlevel
     * @return TriggerprospectionnoteForm
     */
    public static function init($userlevel){

        $TriggerprospectionnoteForm = new TriggerprospectionnoteForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $TriggerprospectionnoteForm->remove('triggerprospectionnote_note');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $TriggerprospectionnoteForm;
    }
}