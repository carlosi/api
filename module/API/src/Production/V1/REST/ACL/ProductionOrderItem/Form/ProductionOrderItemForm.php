<?php
namespace Production\V1\REST\ACL\ProductionOrderItem\Form;

use Zend\Form\Form;


class ProductionOrderItemForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionOrderItemForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionorderitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionteam',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionline',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorderitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionstatus',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_dateinit',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_datedelivery',

        ));
    }
}
