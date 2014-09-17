<?php

/**
 * ClientForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Client\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ClientForm
 * @package API\REST\V1\ACL\Company\Client\Form
 */
class ClientForm extends Form
{
	public function __construct()
	{
		 
		parent::__construct('ClientForm');
		$this->setAttribute('method', 'post');
		
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'id Cliente'
            ),
		));
		
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'Id Compañia'
            ),
		));
		 
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'client_iso_codecountry',
            'options' => array(
                'label' => 'País'
            ),
		));
		
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'client_iso_codephone',
            'options' => array(
                'label' => 'Lada internacional'
            ),
		));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'client_firstname',
            'options' => array(
                'label' => 'Nombre'
            ),
        ));

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'client_lastname',
            'options' => array(
                'label' => 'Apellidos'
            ),
        ));

		$this->add(array(
            'type' => 'Email',
            'name' => 'client_email',
            'options' => array(
                'label' => 'Email'
            ),
		));
		
		$this->add(array(
            'type' => 'Email',
            'name' => 'client_email2',
            'options' => array(
                'label' => 'Email secundario'
            ),
		));
		
		$this->add(array(
            'type' => 'Password',
            'name' => 'client_password',
            'options' => array(
                'label' => 'Contraseña'
            ),
        ));
		
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'client_cellular',
            'options' => array(
                'label' => 'Número móvil'
            ),
		));
		
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'client_phone',
            'options' => array(
                'label' => 'Número de oficina'
            ),
		));
		
		$this->add(array(
            'type' => 'Hidden',
            'name' => 'client_language',
            'options' => array(
                'label' => 'Idioma'
            ),
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'client_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'pending' => 'pending',
                    'active' => 'active',
                    'suspended' => 'suspended',
                    'fraud' => 'fraud',
                ),
                'label' => 'Estado'
            ),
        ));

        $this->add(array(
            'type' => 'Select',
            'name' => 'client_type',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'NORMAL' => 'NORMAL',
                    'GENERALPUBLIC' => 'GENERALPUBLIC',
                    'INVENTORYMANAGER' => 'INVENTORYMANAGER',
                ),
                'label' => 'Tipo'
            ),
            'attributes' => array(
                'NORMAL' => 'NORMAL' //set selected to 'NORMAL'
            )
        ));
	}
}
