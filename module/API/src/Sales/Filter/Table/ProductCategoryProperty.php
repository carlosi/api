<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductCategoryProperty implements InputFilterAwareInterface
{
	public $idproductcategoryproperty;
	public $idproductcategory;
	public $productcategoryproperty_name;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproductcategoryproperty 	= (!empty($data['idproductcategoryproperty'])) 		? (int) $data['idproductcategoryproperty'] 		: null;
		$this->idproductcategory 			= (!empty($data['idproductcategory'])) 				? (int) $data['idproductcategory'] 				: null;
		$this->productcategoryproperty_name = (!empty($data['productcategoryproperty_name'])) 	? (string) $data['productcategoryproperty_name']: null;
		$this->result 						= (isset($data['result'])) 							? (float) $data['result'] 						: null;
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
				'name'     => 'idproductcategoryproperty',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproductcategory',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'productcategoryproperty_name',
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