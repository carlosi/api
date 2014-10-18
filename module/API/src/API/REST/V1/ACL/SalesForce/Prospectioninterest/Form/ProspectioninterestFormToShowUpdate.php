<?php

/**
 * ProspectioninterestFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 15/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Prospectioninterest\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestForm;

/**
 * Class ProspectioninterestFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Prospectioninterest\Form
 */
class ProspectioninterestFormToShowUpdate{

    /**
     * @param $userLevel
     * @return ProspectioninterestForm
     */
    public static function init($userLevel){

        $prospectioninterestForm = new ProspectioninterestForm();

        switch ($userLevel){

            case 5: {

                $prospectioninterestForm->remove('idprospectioninterest');
                $prospectioninterestForm->remove('iduser');
                $prospectioninterestForm->remove('idtriggerprospection');

                break;
            }

            case 4: {

                $prospectioninterestForm->remove('idprospectioninterest');
                $prospectioninterestForm->remove('iduser');
                $prospectioninterestForm->remove('idtriggerprospection');

                break;
            }

            case 3: {

                $prospectioninterestForm->remove('idprospectioninterest');
                $prospectioninterestForm->remove('iduser');
                $prospectioninterestForm->remove('idtriggerprospection');

                break;
            }

            case 2: {

                $prospectioninterestForm->remove('idprospectioninterest');
                $prospectioninterestForm->remove('iduser');
                $prospectioninterestForm->remove('idtriggerprospection');

                break;
            }

            case 1: {

                $prospectioninterestForm->remove('idprospectioninterest');
                $prospectioninterestForm->remove('iduser');
                $prospectioninterestForm->remove('idtriggerprospection');

                break;
            }
        }

        return $prospectioninterestForm;
    }

}