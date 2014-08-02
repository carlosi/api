<?php 
namespace REST\v1\Company\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    
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