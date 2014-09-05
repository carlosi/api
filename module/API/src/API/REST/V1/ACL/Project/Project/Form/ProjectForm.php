<?php

/**
 * ProjectForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Project\Project\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProjectForm
 * @package API\REST\V1\ACL\Project\Project\Form
 */
class ProjectForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproject',
            'options' => array(
                'label' => 'idproject'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iddepartment',
            'options' => array(
                'label' => 'iddepartment'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'project_dependency',
            'options' => array(
                'label' => 'project_dependency'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'project_name',
            'options' => array(
                'label' => 'project_name'
            )
        ));
    }
}