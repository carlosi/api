<?php
namespace REST\v1\Production\ACL\ProductionOrderComment\Form;

use Zend\Form\Form;


class ProductionOrderCommentForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductionOrderCommentForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionordercomment',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductionorderitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionordercomment_comment',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productionordercomment_date',

        ));
    }
}
