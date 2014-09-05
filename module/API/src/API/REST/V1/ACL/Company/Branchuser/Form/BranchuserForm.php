<?php

/**
 * BranchuserForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchuser\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class BranchuserForm
 * @package API\REST\V1\ACL\Company\Branchuser\Form
 */
class BranchuserForm extends Form
{
    public function __construct(){
        parent::__construct('BranchuserForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch_user',
            'options' => array(
                'label' => 'Id Usuario de Sucursal'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch',
            'options' => array(
                'label' => 'Id Sucursal'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'Id Usuario'
            ),
        ));

    }
}
