<?php

namespace Contents\ACL\Product;

use Zend\Form\Form;

class ProductForm extends Form
{
    public function __construct(){
        parent::__construct('ProductForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproduct',
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'idproductmain',
        ));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'property_array',
        ));
    }
}