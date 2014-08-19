<?php

/**
 * DepartamentForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departament\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class DepartamentForm
 * @package API\REST\V1\ACL\Company\Departament\Form
 */
class DepartamentForm extends Form
{
    public function __construct(){
        parent::__construct('DepartamentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
            'options' => array(
                'label' => 'Id Departamento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'Id Compañía'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'departament_name',
            'options' => array(
                'label' => 'Departamento'
            ),
        ));
    }
}