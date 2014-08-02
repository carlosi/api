<?php

namespace REST\v1\Project\ACL\ProjectActivityUser\Form;

use Zend\Form\Form;

class ProjectActivityUserForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectActivityPostForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idprojectactivityemployee',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idprojectactivity',
        ));
    }
}