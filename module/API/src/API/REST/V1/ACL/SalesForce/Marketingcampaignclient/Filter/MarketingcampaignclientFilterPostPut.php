<?php

/**
 * MarketingcampaignclientFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Filter;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Filter\MarketingcampaignclientFilter;

/**
 * Class MarketingcampaignclientFilterPostPut
 * @package API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Filter
 */
class MarketingcampaignclientFilterPostPut
{

    /**
     * @param InputFilterInterface $inputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $MarketingcampaignclientFilter = new MarketingcampaignclientFilter();
        $inputFilter = $MarketingcampaignclientFilter->getInputFilter();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $inputFilter;
    }
}

?>

