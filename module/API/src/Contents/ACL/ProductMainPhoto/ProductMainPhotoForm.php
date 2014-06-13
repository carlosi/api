<?php

namespace Contents\ACL\ProductMainPhoto;

use Zend\Form\Form;

class ProductMainPhotoForm extends Form
{
    public function __construct(){
        parent::__construct('ProductMainPhotoForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmainphoto',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idproductmain',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmainphoto_url',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmainphoto_width',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmainphoto_height',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productmainphoto_status',
        ));
    }
}
