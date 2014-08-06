<?php
namespace MercadoLibre\V1\REST\ACL\MLItem\Form;

use Zend\Form\Form;


class MLItemForm extends Form
{
    public function __construct()
    {
        parent::__construct('MLItemForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmlitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlitem_id',

        ));
    }
}
