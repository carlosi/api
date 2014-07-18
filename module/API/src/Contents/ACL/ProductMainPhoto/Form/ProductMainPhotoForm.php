<?php
namespace Contents\ACL\ProductMainPhoto\Form;

use Zend\Form\Form;


class ProductMainPhotoForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductMainPhotoForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmainphoto',
        ));
        $this->add(array(
            'type' => 'Hidden',
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
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'pending' => 'pending',
                    'rejected' => 'rejected',
                    'active' => 'active',
                    'revision' => 'revision',
                ),
            ),
        ));
    }
}
