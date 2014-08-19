<?php

/**
 * ProjectForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
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
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproject'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'project_dependency',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'project_name',
        ));
    }
}