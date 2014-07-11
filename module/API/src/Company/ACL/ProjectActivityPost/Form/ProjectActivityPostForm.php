<?php

namespace Company\ACL\ProjectActivityPost\Form;

use Zend\Form\Form;

class ProjectActivityPostForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectActivityPostForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idprojectactivitypost',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idprojectactivity'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'projectactivitypost_text',
        ));
    }
}