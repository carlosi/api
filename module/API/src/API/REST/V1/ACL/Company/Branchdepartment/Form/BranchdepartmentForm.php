<?php

/**
 * BranchdepartmentForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchdepartment\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class BranchdepartmentForm
 * @package API\REST\V1\ACL\Company\Branchdepartment\Form
 */
class BranchdepartmentForm extends Form
{
    public function __construct()
    {
        parent::__construct('BranchdepartmentForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranchdepartment',
            'options' => array(
                'label' => 'Id Sucursal',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch',
            'options' => array(
                'label' => 'Id Compañía',
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
            'options' => array(
                'label' => 'Sucursal',
            ),
        ));
    }
}
