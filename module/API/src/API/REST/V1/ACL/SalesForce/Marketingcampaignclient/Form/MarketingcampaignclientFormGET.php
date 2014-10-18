<?php

/**
 * MarketingcampaignclientFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Marketingcampaignclient\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Marketingcampaignclient\Form\MarketingcampaignclientForm;

/**
 * Class MarketingcampaignclientFormGET
 * @package API\REST\V1\ACL\Salesforce\Marketingcampaignclient\Form
 */
class MarketingcampaignclientFormGET
{
    /**
     * @param $userlevel
     * @return MarketingcampaignclientForm
     */
    public static function init($userlevel){

        $MarketingcampaignclientForm = new MarketingcampaignclientForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $MarketingcampaignclientForm->remove('idmarketingcampaign');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $MarketingcampaignclientForm;
    }
}