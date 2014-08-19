<?php

/**
 * ProductionuserForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionuser\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductionuserForm
 * @package API\REST\V1\ACL\Production\Productionuser\Form
 */
class ProductionuserForm extends Form
{
    public function __construct(){
        parent::__construct('ProductionuserForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionuser',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionteam',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
        ));

    }
}
