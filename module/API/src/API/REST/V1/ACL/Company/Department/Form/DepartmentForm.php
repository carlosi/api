<?php

/**
 * DepartmentForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Department\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class DepartmentForm
 * @package API\REST\V1\ACL\Company\Department\Form
 */
class DepartmentForm extends Form
{
    public function __construct(){
        parent::__construct('DepartmentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
            'options' => array(
                'label' => 'iddepartment'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'idcompany'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'department_name',
            'options' => array(
                'label' => 'department_name'
            ),
        ));
    }
}