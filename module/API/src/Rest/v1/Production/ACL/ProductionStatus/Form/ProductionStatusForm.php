<?php
namespace Production\ACL\ProductionStatus\Form;

use Zend\Form\Form;


class ProductionStatusForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionStatusForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionstatus',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionstatus_name',

        ));
    }
}
