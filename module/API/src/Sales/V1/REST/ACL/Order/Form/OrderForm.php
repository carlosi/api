<?php

namespace Sales\V1\REST\ACL\Order\Form;

use Zend\Form\Form;

class OrderForm extends Form
{
    public function __construct(){
        parent::__construct('OrderForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder',
            'options' => array(
                'label' => 'Id orden'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch',
            'options' => array(
                'label' => 'Id sucursal'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'Id cliente'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'created_at',
            'options' => array(
                'label' => 'Fecha de creación'
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('COMPLETE','INCOMPLETE'),
                'label' => 'Estado de la orden',
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_payment',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('PAID','UNPAID'),
                'label' => 'Estado del pago',
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_paymentmode',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('UNIQUE','PARTIAL'),
                'label' => 'Modo de pago',
            ),
            'attributes' => array(
                'UNIQUE' => 'UNIQUE' //set selected to 'UNIQUE'
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'order_delivery',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array('LOCALMODE','SHIPMODE','TRANSIT','FINISHED','TRANSITTOBRANCH'),
                'label' => 'Modo de entrega'
            ),
        ));
    }
}