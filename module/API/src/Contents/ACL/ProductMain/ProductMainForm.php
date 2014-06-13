<?php

namespace Contents\ACL\ProductMain;

use Zend\Form\Form;

class ProductMainForm extends Form
{
    public function __construct(){
        parent::__construct('ProductMainForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',

        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idproductcategory',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_name',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productmain_unit',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_discount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_eachpieces',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_maxdiscount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_baseproperty',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productmain_type',
        ));
    }
}
