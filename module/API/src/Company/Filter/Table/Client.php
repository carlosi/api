<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class Client implements InputFilterAwareInterface
{
	public $idclient;
	public $idcompany;
	public $client_iso_codecountry;
	public $client_iso_codephone;
	public $client_fullname;
	public $client_email;
	public $client_email2;
	public $client_password;
	public $client_cellular;
	public $client_phone;
	public $client_language;
	public $client_status;
	public $client_type;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idclient 				= (!empty($data['idclient'])) 				? (int) $data['idclient'] 					: null;
		$this->idcompany 				= (!empty($data['idcompany'])) 				? (int) $data['idcompany'] 					: null;
		$this->client_iso_codecountry 	= (!empty($data['client_iso_codecountry'])) ? (string) $data['client_iso_codecountry']  : null;
		$this->client_iso_codephone 	= (!empty($data['client_iso_codephone'])) 	? (string) $data['client_iso_codephone'] 	: null;  
		$this->client_fullname 			= (!empty($data['client_fullname'])) 		? (string) $data['client_fullname'] 		: null;  
		$this->client_email 			= (!empty($data['client_email'])) 			? (string) $data['client_email'] 			: null;  
		$this->client_email2 			= (!empty($data['client_email2'])) 			? (string) $data['client_email2'] 			: null;  
		$this->client_password 			= (!empty($data['client_password'])) 		? (string) $data['client_password'] 		: null;  
		$this->client_cellular 			= (!empty($data['client_cellular'])) 		? (string) $data['client_cellular'] 	: null;  
		$this->client_phone 			= (!empty($data['client_phone'])) 			? (string) $data['client_phone'] 			: null;  
		$this->client_language 			= (!empty($data['client_language'])) 		? (string) $data['client_language'] 		: null; 
		$this->client_status 			= (!empty($data['client_status'])) 			? (string) $data['client_status'] 		: null;
		$this->client_type 				= (!empty($data['client_type'])) 			? (string) $data['client_type'] 		: null;
		
		$this->result 					= (!empty($data['result'])) 					? (float) $data['result']	 				: null;
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
				'name'     => 'idclient',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idcompany',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'client_iso_codecountry',
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
				'name' => 'client_iso_codephone',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_fullname',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_email',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_email2',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_password',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_cellular',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_phone',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
				'name' => 'client_language',
				'required' => false,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
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
					'name' => 'client_status',
					'required' => true,
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim')
					),
					'validators' => array(
							array(
									'name' => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min' => '3',
											'max' => '20',
									),
							),
					),
			));
			$inputFilter->add(array(
					'name' => 'client_type',
					'required' => false,		// en mysql esta por default: NORMAL
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim')
					),
					'validators' => array(
							array(
									'name' => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min' => '1',
											'max' => '20',
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