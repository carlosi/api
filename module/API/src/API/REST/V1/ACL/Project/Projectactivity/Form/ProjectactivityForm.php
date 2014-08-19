<?php

/**
 * ProjectactivityForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivity\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProjectactivityForm
 * @package API\REST\V1\ACL\Proyect\Projectactivity\Form
 */
class ProjectactivityForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectactivityForm');

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