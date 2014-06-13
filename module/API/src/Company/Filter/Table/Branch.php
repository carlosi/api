<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class Branch implements InputFilterAwareInterface
{
	public $idbranch;
	public $idcompany;
	public $branch_name;
	public $branch_iso_codecountry;
	public $branch_address;
	public $branch_address2;
	public $branch_city;
	public $branch_state;
	public $branch_zipcode;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idbranch 				= (!empty($data['idbranch'])) 					? (int) $data['idbranch'] 					: null;
		$this->idcompany 				= (!empty($data['idcompany'])) 					? (int) $data['idcompany'] 					: null;
		$this->branch_name  			= (!empty($data['branch_name'])) 				? (string) $data['branch_name'] 			: null;  
		$this->branch_iso_codecountry  	= (!empty($data['branch_iso_codecountry'])) 	? (string) $data['branch_iso_codecountry'] 	: null;  
		$this->branch_address  			= (!empty($data['branch_address'])) 			? (string) $data['branch_address'] 			: null;  
		$this->branch_address2  		= (!empty($data['branch_address2'])) 			? (string) $data['branch_address2'] 		: null;  
		$this->branch_city  			= (!empty($data['branch_city'])) 				? (string) $data['branch_city'] 			: null;  
		$this->branch_state  			= (!empty($data['branch_state'])) 				? (string) $data['branch_state'] 			: null;  
		$this->branch_zipcode  			= (!empty($data['branch_zipcode'])) 			? (string) $data['branch_zipcode'] 			: null;  
		$this->result 					= (isset($data['result'])) 						? (float) $data['result'] 					: null;
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
				'name'     => 'idbranch',
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
				'name' => 'branch_name',
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
						),
					),
				),
			));		
			$inputFilter->add(array(
				'name' => 'branch_iso_codecountry',
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
				'name' => 'branch_address',
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
				'name' => 'branch_address2',
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
				'name' => 'branch_city',
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
				'name' => 'branch_state',
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
				'name' => 'branch_zipcode',
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