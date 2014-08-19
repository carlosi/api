<?php

/**
 * LoginForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Login\Form;

// - ZF2 - //
use Zend\Form\Form;


/**
 * Class LoginForm
 * @package API\REST\V1\Login\Form
 */
class LoginForm extends Form
{
    /**
     * @param null $employee_email
     * @param null $employee_password
     */
    public function __construct($employee_email=null,$employee_password=null)
    {
        parent::__construct('LoginForm');
        $this->setAttribute('method', 'post');
       
        
        $this->add(array(
                'type' => 'Email',
                'name' => 'employee_email',
        		'attributes' => array(
        				'value'  => $employee_email,
        		),
        ));
       
        $this->add(array(
         		'type' => 'Password',
         		'name' => 'employee_password',
         		'attributes' => array(
        				'value'  => $employee_password,
        		),
         ));
    }
}