<?php

/**
 * DepartmentForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
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
            'name' => 'department_name',
            'options' => array(
                'label' => 'department name'
            ),
        ));
        
        $this->add(array(
            'type' => 'Select',
            'name' => 'department_type',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'global' => 'global',
                    'local' => 'local',
                ),
                'label' => 'department type'
            ),
        ));
    }
}