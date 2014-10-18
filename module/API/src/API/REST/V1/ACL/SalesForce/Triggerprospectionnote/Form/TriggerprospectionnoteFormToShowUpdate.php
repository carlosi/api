<?php

/**
 * TriggerprospectionnoteFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 13/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form\TriggerprospectionnoteForm;

/**
 * Class TriggerprospectionnoteFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form
 */
class TriggerprospectionnoteFormToShowUpdate{

    /**
     * @param $userLevel
     * @return TriggerprospectionnoteForm
     */
    public static function init($userLevel){

        $triggerprospectionnoteForm = new TriggerprospectionnoteForm();

        switch ($userLevel){

            case 5: {

                $triggerprospectionnoteForm->remove('idtriggerprospectionnote');

                break;
            }

            case 4: {

                $triggerprospectionnoteForm->remove('idtriggerprospectionnote');

                break;
            }

            case 3: {

                $triggerprospectionnoteForm->remove('idtriggerprospectionnote');

                break;
            }

            case 2: {

                $triggerprospectionnoteForm->remove('idtriggerprospectionnote');

                break;
            }

            case 1: {

                $triggerprospectionnoteForm->remove('idtriggerprospectionnote');

                break;
            }
        }

        return $triggerprospectionnoteForm;
    }

}