<?php

namespace Project\ACL\Project\Form;

use Zend\Form\Form;

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