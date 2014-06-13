<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ClientComment implements InputFilterAwareInterface
{
	public $idclientcomment;
	public $idclient;
	public $clientcomment_note;
	public $clientcomment_date;
	
	public $idcompany;
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idcompany 						= (!empty($data['idcompany'])) 							? (int) $data['idcompany'] 							: null;
		
		$this->idclientcomment 		= (!empty($data['idclientcomment'])) 			? (int) $data['idclientcomment'] 			: null;
		$this->idclient 			= (!empty($data['idclient'])) 					? (int) $data['idclient'] 					: null;
		$this->clientcomment_note  	= (!empty($data['clientcomment_note'])) 		? (string) $data['clientcomment_note']	 	: null;  
		$this->clientcomment_date  	= (!empty($data['clientcomment_date'])) 		? (string) $data['clientcomment_date'] 		: null;  
		$this->result 				= (isset($data['result'])) 			? (string) $data['result'] 		: null;
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
				'name'     => 'idclientcomment',
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
				'name' => 'clientcomment_note',
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
				'name'		=> 'clientcomment_date',
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