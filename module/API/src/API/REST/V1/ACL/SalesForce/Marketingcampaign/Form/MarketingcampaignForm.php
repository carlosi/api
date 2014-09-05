<?php

/**
 * MarketingcampaignForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Marketingcampaign\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MarketingcampaignForm
 * @package API\REST\V1\ACL\SalesForce\Marketingcampaign\Form
 */
class MarketingcampaignForm extends Form
{
    public function __construct()
    {
        parent::__construct('MarketingcampaignForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmarketingcampaign',
            'options' => array(
                'label' => 'id marketing campaing'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmarketingchannel',
            'options' => array(
                'label' => 'id marketing channel'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'marketingcampaign_name',
            'options' => array(
                'label' => 'marketing campaing name'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'marketingcampaign_created_at',
            'options' => array(
                'label' => 'marketing campaing created at'
            ),
        ));
    }
}