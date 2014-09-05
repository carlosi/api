<?php

/**
 * ProjectactivityuserForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Proyect\Projectactivityuser\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProjectactivityuserForm
 * @package API\REST\V1\ACL\Proyect\Projectactivityuser\Form
 */
class ProjectactivityuserForm extends Form
{
    public function __construct(){
        parent::__construct('ProjectactivitypostForm');

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