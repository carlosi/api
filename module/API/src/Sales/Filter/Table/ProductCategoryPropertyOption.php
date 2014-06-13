<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductCategoryPropertyOption implements InputFilterAwareInterface
{
	public $idproductcategorypropertyoption;
	public $idproductcategoryproperty;
	public $productcategorypropertyoption_name;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproductcategorypropertyoption 		= (!empty($data['idproductcategorypropertyoption'])) 		? (int) $data['idproductcategorypropertyoption'] 		: null;
		$this->idproductcategoryproperty 			= (!empty($data['idproductcategoryproperty'])) 				? (int) $data['idproductcategoryproperty'] 				: null;
		$this->productcategorypropertyoption_name 	= (!empty($data['productcategorypropertyoption_name'])) 	? (string) $data['productcategorypropertyoption_name']	: null;
		$this->result 								= (isset($data['result'])) 									? (float) $data['result'] 								: null;
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
				'name'     => 'idproductcategorypropertyoption',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproductcategoryproperty',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'productcategorypropertyoption_name',
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