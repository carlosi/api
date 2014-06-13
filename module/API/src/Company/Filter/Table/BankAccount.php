<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class BankAccount implements InputFilterAwareInterface
{
	public $idbankaccount;
	public $idcompany;
	public $bankaccount_name;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idbankaccount 		= (!empty($data['idbankaccount'])) 		? (int) $data['idbankaccount'] 			: null;
		$this->idcompany 			= (!empty($data['idcompany'])) 			? (int) $data['idcompany'] 				: null;
		$this->bankaccount_name  	= (!empty($data['bankaccount_name'])) 	? (string) $data['bankaccount_name'] 	: null;  
		
		$this->result 				= (isset($data['result'])) 				? (float) $data['result'] 				: null;
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
				'name'     => 'idbankaccount',
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
				'name' => 'bankaccount_name',
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
							'min'	=>	'1',
							'max'	=>	'100'
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