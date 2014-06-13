<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class MxTaxInfo implements InputFilterAwareInterface
{
	public $idmxtaxinfo;
	public $idcompany;
	public $mxtaxinfo_rfc;
	public $mxtaxinfo_razonsocial;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idmxtaxinfo 				= (!empty($data['idmxtaxinfo'])) 			? (int) $data['idmxtaxinfo'] 				: null;
		$this->idcompany 				= (!empty($data['idcompany'])) 				? (int) $data['idcompany'] 					: null;
		$this->mxtaxinfo_rfc  			= (!empty($data['mxtaxinfo_rfc'])) 			? (string) $data['mxtaxinfo_rfc'] 			: null;  
		$this->mxtaxinfo_razonsocial  	= (!empty($data['mxtaxinfo_razonsocial'])) 	? (string) $data['mxtaxinfo_razonsocial'] 	: null;  
		
		$this->result 		= (isset($data['result'])) 			? (float) $data['result'] 		: null;
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
				'name'     => 'idmxtaxinfo',
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
				'name' => 'mxtaxinfo_rfc',
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
			
			$inputFilter->add(array(
				'name' => 'mxtaxinfo_razonsocial',
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