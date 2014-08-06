<?php
namespace Contents\V1\REST\ACL\ProductCategory\Form;

use Zend\Form\Form;


class ProductCategoryForm extends Form
{
    public function __construct()
    {
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
            'type' => 'Select',
            'name' => 'product_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'ACTIVE' => 'ACTIVE',
                    'INACTIVE' => 'INACTIVE',
                ),
            ),
            'attributes' => array(
                'ACTIVE' => 'ACTIVE' //set selected to 'ACTIVE'
            )
        ));
    }
}
