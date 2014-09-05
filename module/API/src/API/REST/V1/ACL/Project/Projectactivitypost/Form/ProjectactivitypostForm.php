<?php

/**
 * ProjectactivitypostForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivitypost\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProjectactivitypostForm
 * @package API\REST\V1\ACL\Proyect\Projectactivitypost\Form
 */
class ProjectactivitypostForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectactivitypostForm');

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