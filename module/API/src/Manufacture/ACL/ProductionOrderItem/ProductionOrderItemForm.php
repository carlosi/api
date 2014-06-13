<?php

namespace Manufacture\ACL\ProductionOrderItem;

use Zend\Form\Form;

class ProductionOrderItemForm extends Form
{
    public function __construct(){
        parent::__construct('ProductionOrderItemForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionorderitem',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idproductionteam',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idorderitem',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_dateinit',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_datedelivery',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionorderitem_note',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productionorderitem_status',
        ));

    }
}
