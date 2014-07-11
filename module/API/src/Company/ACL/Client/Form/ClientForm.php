<?php 
namespace Company\ACL\Client\Form;

use Zend\Form\Form;


class ClientForm extends Form
{
	public function __construct()
	{
		 
		parent::__construct('ClientForm');
		$this->setAttribute('method', 'post');
		
		$this->add(array(
				'type' => 'Hidden',
				'name' => 'idclient',	
		));
		
		$this->add(array(
				'type' => 'Hidden',
				'name' => 'idcompany',
		));
		 
		$this->add(array(
				'type' => 'Select',
				'name' => 'client_iso_codecountry',
		));
		
		$this->add(array(
				'type' => 'Select',
				'name' => 'client_iso_codephone',
		));
		
		$this->add(array(
				'type' => 'Hidden',
				'name' => 'client_name',
				
		));
		
		$this->add(array(
				'type' => 'Email',
				'name' => 'client_email',
		));
		
		$this->add(array(
				'type' => 'Email',
				'name' => 'client_email2',
		));
		
		$this->add(array(
				'type' => 'Password',
				'name' => 'client_password',
		));
		
		$this->add(array(
				'type' => 'Hidden',
				'name' => 'client_cellular',
				
		));
		
		$this->add(array(
				'type' => 'Hidden',
				'name' => 'client_phone',		
		));
		
		$this->add(array(
				'type' => 'Select',
				'name' => 'client_language',
		));
		
		$this->add(array(
				'type' => 'Select',
				'name' => 'client_status',
		));
		$this->add(array(
				'type' => 'Select',
				'name' => 'client_type',
		));             
	}
}
