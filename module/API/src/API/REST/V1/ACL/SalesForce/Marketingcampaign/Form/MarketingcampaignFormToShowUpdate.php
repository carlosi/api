<?php

/**
 * MarketingcampaignFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 13/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Marketingcampaign\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Form\MarketingcampaignForm;

/**
 * Class MarketingcampaignFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Marketingcampaign\Form
 */
class MarketingcampaignFormToShowUpdate{

    /**
     * @param $userLevel
     * @return MarketingcampaignForm
     */
    public static function init($userLevel){

        $marketingcampaignForm = new MarketingcampaignForm();

        switch ($userLevel){

            case 5: {

                $marketingcampaignForm->remove('idmarketingcampaign');
                $marketingcampaignForm->remove('idmarketingchannel');

                break;
            }

            case 4: {

                $marketingcampaignForm->remove('idmarketingcampaign');
                $marketingcampaignForm->remove('idmarketingchannel');

                break;
            }

            case 3: {

                $marketingcampaignForm->remove('idmarketingcampaign');
                $marketingcampaignForm->remove('idmarketingchannel');

                break;
            }

            case 2: {

                $marketingcampaignForm->remove('idmarketingcampaign');
                $marketingcampaignForm->remove('idmarketingchannel');

                break;
            }

            case 1: {

                $marketingcampaignForm->remove('idmarketingcampaign');
                $marketingcampaignForm->remove('idmarketingchannel');

                break;
            }
        }

        return $marketingcampaignForm;
    }

}