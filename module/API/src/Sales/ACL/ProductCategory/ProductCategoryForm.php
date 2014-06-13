<?php

namespace Sales\ACL\ProductCategory;

use Zend\Form\Form;

class ProductCategoryForm extends Form
{
    public function __construct(){
        parent::__construct('ProductCategoryForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategory',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'category_name',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productcategory_dependency',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productcategory_property',
        ));
    }
} 