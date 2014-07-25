<?php
namespace Contents\ACL\Product\Form;

use Zend\Form\Form;


class ProductForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproduct',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'property_array',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'product_status',
        ));
    }
}
