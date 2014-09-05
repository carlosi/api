<?php

/**
 * MarketingcampaignFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Marketingcampaign\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Marketingcampaign\Form\MarketingcampaignForm;

/**
 * Class MarketingcampaignFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Marketingcampaign\Form
 */
class MarketingcampaignFormPostPut{

    /**
     * @param $userLevel
     * @return MarketingcampaignForm
     */
    public static function init($userLevel){

        $MarketingcampaignForm = new MarketingcampaignForm();

        switch ($userLevel){

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