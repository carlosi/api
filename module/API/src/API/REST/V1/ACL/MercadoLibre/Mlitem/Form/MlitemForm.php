<?php

/**
 * MlitemForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\MercadoLibre\Mlitem\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MlitemForm
 * @package API\REST\V1\ACL\MercadoLibre\Mlitem\Form
 */
class MlitemForm extends Form
{
    public function __construct()
    {
        parent::__construct('mlitemForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmlitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlitem_id',

        ));
    }
}
