<?php
namespace Contents\V1\REST\ACL\ProductCategoryPropertyOption\Form;

use Zend\Form\Form;


class ProductCategoryPropertyOptionForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductCategoryPropertyOptionForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategorypropertyoption',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategoryproperty',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productcategorypropertyoption_name',
        ));
    }
}
