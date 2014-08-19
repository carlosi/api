<?php

/**
 * DepartamentmemberForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Departamentmember\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class DepartamentmemberForm
 * @package API\REST\V1\ACL\Company\Departamentmember\Form
 */
class DepartamentmemberForm extends Form
{
    public function __construct(){
        parent::__construct('DepartamentmemberForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartamentmember',
            'options' => array(
                'label' => 'Id Miembro de Departamento'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartament',
            'options' => array(
                'label' => 'Id Departamento'
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