<?php
namespace Shipping\ACL\ShippingHistory\Form;

use Zend\Form\Form;

class ShippingHistoryForm extends Form
{
    public function __construct()
    {
        parent::__construct('ShippingHistoryForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping_history',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idshipping',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idemployee',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_history_msg',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'shipping_history_date',
        ));
    }
}
