<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ClientTax implements InputFilterAwareInterface
{
	public $idclienttax;
	public $idclient;
	public $clienttax_iso_codecountry;
	public $clienttax_iso_codephone;
	public $clienttax_name;
	public $clienttax_taxesid;
	public $clienttax_address;
	public $clienttax_address2;
	public $clienttax_city;
	public $clienttax_state;
	public $clienttax_zipcode;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idclienttax 					= (!empty($data['idclienttax'])) 				? (int) $data['idclienttax'] 					: null;
		$this->idclient 					= (!empty($data['idclient'])) 					? (int) $data['idclient'] 						: null;
		$this->clienttax_iso_codecountry 	= (!empty($data['clienttax_iso_codecountry'])) 	? (string) $data['clienttax_iso_codecountry']  	: null;
		$this->clienttax_iso_codephone 		= (isset($data['clienttax_iso_codephone'])) 	? (string) $data['clienttax_iso_codephone'] 	: null;  
		$this->clienttax_name 				= (isset($data['clienttax_name'])) 				? (string) $data['clienttax_name'] 				: null;  
		$this->clienttax_taxesid 			= (isset($data['clienttax_taxesid'])) 			? (string) $data['clienttax_taxesid'] 			: null;  
		$this->clienttax_address 			= (isset($data['clienttax_address'])) 			? (string) $data['clienttax_address'] 			: null;  
		$this->clienttax_address2 			= (isset($data['clienttax_address2'])) 			? (string) $data['clienttax_address2'] 			: null;  
		$this->clienttax_city 				= (isset($data['clienttax_city'])) 				? (string) $data['clienttax_city'] 				: null;  
		$this->clienttax_state 				= (isset($data['clienttax_state'])) 			? (string) $data['clienttax_state'] 			: null;  
		$this->clienttax_zipcode 			= (isset($data['clienttax_zipcode'])) 			? (string) $data['clienttax_zipcode'] 			: null; 
		
		$this->result 						= (isset($data['result'])) 						? (float) $data['result'] 						: null; 
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
				'name'     => 'idclienttax',
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
				'name' => 'clienttax_iso_codecountry',
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
				'name' => 'clienttax_iso_codephone',
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
				'name' => 'clienttax_name',
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
				'name' => 'clienttax_taxesid',
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
				'name' => 'clienttax_address',
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
				'name' => 'clienttax_address2',
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
				'name' => 'clienttax_city',
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
				'name' => 'clienttax_state',
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
				'name' => 'clienttax_zipcode',
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
						
			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}

?>