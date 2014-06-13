<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ClientAddress implements InputFilterAwareInterface
{
	public $idclientaddress;
	public $idclient;
	public $clientaddress_iso_codecountry;
	public $clientaddress_iso_codephone;
	public $clientaddress_addressee;
	public $clientaddress_addressee_cellular;
	public $clientaddress_addressee_phone;
	public $clientaddress_address;
	public $clientaddress_address2;
	public $clientaddress_city;
	public $clientaddress_state;
	public $clientaddress_zipcode;
	
	public $idcompany;
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idcompany 						= (!empty($data['idcompany'])) 							? (int) $data['idcompany'] 							: null;
		$this->idclientaddress 					= (!empty($data['idclientaddress'])) 					? (int) $data['idclientaddress'] 					: null;
		$this->idclient 						= (!empty($data['idclient'])) 							? (int) $data['idclient'] 							: null;
		$this->clientaddress_iso_codecountry 	= (!empty($data['clientaddress_iso_codecountry'])) 		? (string) $data['clientaddress_iso_codecountry'] 	: null;  
		$this->clientaddress_iso_codephone 		= (!empty($data['clientaddress_iso_codephone'])) 		? (string) $data['clientaddress_iso_codephone'] 	: null;  
		$this->clientaddress_addressee 			= (!empty($data['clientaddress_addressee'])) 			? (string) $data['clientaddress_addressee'] 		: null;  
		$this->clientaddress_addressee_cellular = (!empty($data['clientaddress_addressee_cellular'])) 	? (string) $data['clientaddress_addressee_cellular']: null;  
		$this->clientaddress_addressee_phone 	= (!empty($data['clientaddress_addressee_phone'])) 		? (string) $data['clientaddress_addressee_phone'] 	: null;  
		$this->clientaddress_address 			= (!empty($data['clientaddress_address'])) 				? (string) $data['clientaddress_address'] 			: null;  
		$this->clientaddress_address2 			= (!empty($data['clientaddress_address2'])) 			? (string) $data['clientaddress_address2'] 			: null;  
		$this->clientaddress_city 				= (!empty($data['clientaddress_city'])) 				? (string) $data['clientaddress_city'] 				: null;  
		$this->clientaddress_state 				= (!empty($data['clientaddress_state'])) 				? (string) $data['clientaddress_state'] 			: null;  
		$this->clientaddress_zipcode 			= (!empty($data['clientaddress_zipcode'])) 				? (string) $data['clientaddress_zipcode'] 			: null;  
		$this->result 							= (isset($data['result'])) 								? (float) $data['result'] 							: null;
	}
	
	// Se agrega para editar la tabla en la base de datos "update":
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	
	public $inputFilter;

	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	public function getInputFilter()
	{
		if(!$this->inputFilter)
		{
			$inputFilter = new InputFilter();
			
			$inputFilter->add(array(
				'name'     => 'idclientaddress',
				'required' => false,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idclient',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_iso_codecountry',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));		
			$inputFilter->add(array(
				'name' => 'clientaddress_iso_codephone',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_addressee',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_addressee_cellular',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_addressee_phone',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_address',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_address2',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_city',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_state',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientaddress_zipcode',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));
			
			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}

?>