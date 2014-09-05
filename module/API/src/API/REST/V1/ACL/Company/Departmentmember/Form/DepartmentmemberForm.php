<?php

/**
 * DepartmentmemberForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departmentmember\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class DepartmentmemberForm
 * @package API\REST\V1\ACL\Company\Departmentmember\Form
 */
class DepartmentmemberForm extends Form
{
    public function __construct(){
        parent::__construct('DepartmentmemberForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idDepartmentmember',
            'options' => array(
                'label' => 'Id Miembro de Departmento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idDepartment',
            'options' => array(
                'label' => 'Id Departmento'
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