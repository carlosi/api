<?php

namespace Project\V1\REST\ACL\ProjectActivity\Form;

use Zend\Form\Form;

class ProjectActivityForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectActivityForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idprojectactivity',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproject'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'projectactivity_title',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'projectactivity_description',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'projectactivity_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'pending' => 'pending',
                    'rejected' => 'rejected',
                    'progress' => 'progress',
                    'completed' => 'completed',
                    'pause' => 'pause',
                ),
            ),
            'attributes' => array(
                'pending' => 'pending' //set selected to 'pending'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'projectactivity_dateinit',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'projectactivity_datetofinish',
        ));
    }
}