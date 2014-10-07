<?php

/**
 * DepartmentleaderForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departmentleader\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class DepartmentleaderForm
 * @package API\REST\V1\ACL\Company\Departmentleader\Form
 */
class DepartmentleaderForm extends Form
{
    public function __construct(){
        parent::__construct('DepartmentleaderForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartmentleader',
            'options' => array(
                'label' => 'Id Miembro de Departmento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
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
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'departmentleader_title',
            'options' => array(
                'label' => 'Id Usuario'
            ),
        ));

        // El idstaff es para asignarle a algun miembro del staff la jerarquia de "department_leader"
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idstaff',
            'options' => array(
                'label' => 'Id Staff'
            ),
        ));
    }
}