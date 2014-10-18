<?php

/**
 * MarketingchannelFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 13/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Marketingchannel\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Marketingchannel\Form\MarketingchannelForm;

/**
 * Class MarketingchannelFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Marketingchannel\Form
 */
class MarketingchannelFormToShowUpdate{

    /**
     * @param $userLevel
     * @return MarketingchannelForm
     */
    public static function init($userLevel){

        $marketingchannelForm = new MarketingchannelForm();

        switch ($userLevel){

            case 5: {

                $marketingchannelForm->remove('idmarketingchannel');
                $marketingchannelForm->remove('idcompany');

                break;
            }

            case 4: {

                $marketingchannelForm->remove('idmarketingchannel');
                $marketingchannelForm->remove('idcompany');

                break;
            }

            case 3: {

                $marketingchannelForm->remove('idmarketingchannel');
                $marketingchannelForm->remove('idcompany');

                break;
            }

            case 2: {

                $marketingchannelForm->remove('idmarketingchannel');
                $marketingchannelForm->remove('idcompany');

                break;
            }

            case 1: {

                $marketingchannelForm->remove('idmarketingchannel');
                $marketingchannelForm->remove('idcompany');

                break;
            }
        }

        return $marketingchannelForm;
    }

}