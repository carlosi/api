<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class Company implements InputFilterAwareInterface
{
	public $idcompany;
	public $company_name;
	public $company_timezone;
	public $company_iso_codecountry;
	public $company_address;
	public $company_address2;
	public $company_city;
	public $company_state;
	public $company_zipcode;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idcompany 				= (!empty($data['idcompany'])) 					? (int) $data['idcompany'] 						: null;
		$this->company_name 			= (!empty($data['company_name'])) 				? (string) $data['company_name'] 				: null;
		$this->company_timezone 		= (!empty($data['company_timezone'])) 				? (string) $data['company_timezone'] 			: null;  
		$this->company_iso_codecountry 	= (!empty($data['company_iso_codecountry'])) 	? (string) $data['company_iso_codecountry'] 	: null;  
		$this->company_address 			= (!empty($data['company_address'])) 			? (string) $data['company_address'] 			: null;  
		$this->company_address2 		= (!empty($data['company_address2'])) 			? (string) $data['company_address2'] 			: null;  
		$this->company_city 			= (!empty($data['company_city'])) 				? (string) $data['company_city'] 				: null;  
		$this->company_state 			= (!empty($data['company_state'])) 				? (string) $data['company_state'] 				: null;  
		$this->company_zipcode 			= (!empty($data['company_zipcode'])) 			? (string) $data['company_zipcode'] 			: null;  
		$this->result 					= (isset($data['result'])) 						? (float) $data['result'] 						: null;
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
				'name'     => 'idcompany',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			
			$inputFilter->add(array(
				'name' => 'company_name',
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
				'name' => 'company_timezone',
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
				'name' => 'company_iso_codecountry',
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
				'name' => 'company_address',
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
				'name' => 'company_address2',
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
				'name' => 'company_city',
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
				'name' => 'company_state',
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
				'name' => 'company_zipcode',
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
			
			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}

?>