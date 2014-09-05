<?php

/**
 * MarketingcampaignclientFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Form\MarketingcampaignclientForm;

/**
 * Class MarketingcampaignclientFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Form
 */
class MarketingcampaignclientFormPostPut{

    /**
     * @param $userLevel
     * @return MarketingcampaignclientForm
     */
    public static function init($userLevel){

        $MarketingcampaignclientForm = new MarketingcampaignclientForm();

        switch ($userLevel){

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