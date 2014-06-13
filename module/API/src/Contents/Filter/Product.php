<?php 

namespace Contents\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class Product implements InputFilterAwareInterface
{
	public $idproduct;
	public $idcompany;
	public $idproductmain;
	public $productmain_name;
	public $property_array;
	
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproduct 		= (!empty($data['idproduct'])) 			? (int) $data['idproduct'] 			: null;
		$this->idcompany 		= (!empty($data['idcompany'])) 			? (int) $data['idcompany'] 			: null;
		$this->idproductmain 	= (!empty($data['idproductmain'])) 		? (int) $data['idproductmain'] 		: null;
		$this->productmain_name = (!empty($data['productmain_name'])) 	? (string) $data['productmain_name']: null;
		
		
		$this->property_array 	= (!empty($data['property_array'])) 	? (string) $data['property_array'] 	: null;
		
		$this->result 			= (!empty($data['result'])) 				? (float) $data['result'] 			: null;
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
				'name'     => 'idproduct',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproductmain',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'property_array',
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
							'max' => '1000',
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