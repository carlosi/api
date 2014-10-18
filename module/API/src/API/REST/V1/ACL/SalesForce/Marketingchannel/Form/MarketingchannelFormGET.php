<?php

/**
 * MarketingchannelFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Marketingchannel\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Marketingchannel\Form\MarketingchannelForm;

/**
 * Class MarketingchannelFormGET
 * @package API\REST\V1\ACL\Salesforce\Marketingchannel\Form
 */
class MarketingchannelFormGET
{
    /**
     * @param $userlevel
     * @return MarketingchannelForm
     */
    public static function init($userlevel){

        $MarketingchannelForm = new MarketingchannelForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $MarketingchannelForm->remove('marketingchannel_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $MarketingchannelForm;
    }
}