<?php

/**
 * MarketingchannelForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Marketingchannel\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MarketingchannelForm
 * @package API\REST\V1\ACL\SalesForce\Marketingchannel\Form
 */
class MarketingchannelForm extends Form
{
    public function __construct()
    {
        parent::__construct('MarketingchannelForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmarketingchannel',
            'options' => array(
                'label' => 'id marketing chanel'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'id company'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'marketingchannel_name',
            'options' => array(
                'label' => 'marketing chanel name'
            ),
        ));
    }
}