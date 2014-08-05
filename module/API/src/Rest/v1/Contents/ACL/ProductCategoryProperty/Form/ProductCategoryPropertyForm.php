<?php
namespace Contents\ACL\ProductCategoryProperty\Form;

use Zend\Form\Form;


class ProductCategoryPropertyForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductCategoryPropertyForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategoryproperty',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategory',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productcategoryproperty_name',
        ));
    }
}
