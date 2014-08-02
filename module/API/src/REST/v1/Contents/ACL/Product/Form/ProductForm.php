<?php
namespace REST\v1\Contents\ACL\Product\Form;

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
            'options' => array(
                'label' => 'Id Producto'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',
            'options' => array(
                'label' => 'Id Producto'
            ),
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
