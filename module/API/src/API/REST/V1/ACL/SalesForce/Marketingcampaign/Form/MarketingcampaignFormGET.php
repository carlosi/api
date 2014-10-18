<?php

/**
 * MarketingcampaignFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Marketingcampaign\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Form\MarketingcampaignForm;

/**
 * Class MarketingcampaignFormGET
 * @package API\REST\V1\ACL\Salesforce\Marketingchannel\Form
 */
class MarketingcampaignFormGET
{
    /**
     * @param $userlevel
     * @return MarketingcampaignForm
     */
    public static function init($userlevel){

        $MarketingcampaignForm = new MarketingcampaignForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $MarketingcampaignForm->remove('marketingcampaign_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $MarketingcampaignForm;
    }
}