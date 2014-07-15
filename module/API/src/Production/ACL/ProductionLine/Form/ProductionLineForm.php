<?php
namespace Production\ACL\ProductionLine\Form;

use Zend\Form\Form;


class ProductionLineForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionLineForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionline_name',

        ));
    }
}
