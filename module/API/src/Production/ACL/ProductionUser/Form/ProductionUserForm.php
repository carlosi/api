<?php

namespace Production\ACL\ProductionUser\Form;

use Zend\Form\Form;

class ProductionUserForm extends Form
{
    public function __construct(){
        parent::__construct('ProductionUserForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionuser',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionteam',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
        ));

    }
}
