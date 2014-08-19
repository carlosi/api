<?php

/**
 * UseraclForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Useracl\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class UseraclForm
 * @package API\REST\V1\ACL\Company\Useracl\Form
 */
class UseraclForm extends Form
{
    public function __construct(){
        parent::__construct('UseraclForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduseracl',
            'options' => array(
                'label' => 'Id ACL Usuario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',
            'options' => array(
                'label' => 'Id Usuario'
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'module_name',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'basic' => 'basic',
                    'sales' => 'sales',
                    'company' => 'company',
                    'manufacture' => 'manufacture',
                    'contents' => 'contents',
                ),
                'label' => 'Nombre del Módulo',
            ),
            'attributes' => array(
                'basic' => 'basic' //set selected to 'basic'
            )
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'user_accesslevel',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ),
                'label' => 'Nivel de acceso',
            ),
            'attributes' => array(
                '1' => '1' //set selected to '1'
            )
        ));
    }
}