<?php

/**
 * MarketingcampaignclientForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MarketingcampaignclientForm
 * @package API\REST\V1\ACL\SalesForce\Marketingcampaignclient\Form
 */
class MarketingcampaignclientForm extends Form
{
    public function __construct()
    {
        parent::__construct('MarketingcampaignclientForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmarketingcampaignclient',
            'options' => array(
                'label' => 'id marketing campaing client'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'id client'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmarketingcampaign',
            'options' => array(
                'label' => 'id marketing campaing'
            ),
        ));
    }
}