<?php

/**
 * TriggerprospectionFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 14/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospection\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionForm;

/**
 * Class TriggerprospectionFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Triggerprospection\Form
 */
class TriggerprospectionFormToShowUpdate{

    /**
     * @param $userLevel
     * @return TriggerprospectionForm
     */
    public static function init($userLevel){

        $triggerprospectionForm = new TriggerprospectionForm();

        switch ($userLevel){

            case 5: {

                $triggerprospectionForm->remove('idtriggerprospection');
                $triggerprospectionForm->remove('idclient');

                break;
            }

            case 4: {

                $triggerprospectionForm->remove('idtriggerprospection');
                $triggerprospectionForm->remove('idclient');

                break;
            }

            case 3: {

                $triggerprospectionForm->remove('idtriggerprospection');
                $triggerprospectionForm->remove('idclient');

                break;
            }

            case 2: {

                $triggerprospectionForm->remove('idtriggerprospection');
                $triggerprospectionForm->remove('idclient');

                break;
            }

            case 1: {

                $triggerprospectionForm->remove('idtriggerprospection');
                $triggerprospectionForm->remove('idclient');

                break;
            }
        }

        return $triggerprospectionForm;
    }

}