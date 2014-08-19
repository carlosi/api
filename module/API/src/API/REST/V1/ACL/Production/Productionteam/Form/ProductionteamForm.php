<?php

/**
 * ProductionteamForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionteam\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductionteamForm
 * @package API\REST\V1\ACL\Production\Productionteam\Form
 */
class ProductionteamForm extends Form
{
    public function __construct(){
        parent::__construct('ProductionteamForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionteam',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionteam_name',
        ));

    }
}