<?php

namespace Manufacture\ACL\ProductionTeam;

use Zend\Form\Form;

class ProductionTeamForm extends Form
{
    public function __construct(){
        parent::__construct('ProductionTeamForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionteam',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionteam_name',
        ));

    }
}