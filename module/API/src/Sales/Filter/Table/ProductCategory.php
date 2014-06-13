<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductCategory implements InputFilterAwareInterface
{
	public $idproductcategory;
	public $category_name;
	public $productcategory_dependency;
	public $productcategory_property;
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproductcategory 			= (!empty($data['idproductcategory'])) 			? (int) $data['idproductcategory'] 			: null;
		$this->category_name 				= (!empty($data['category_name'])) 				? (string) $data['category_name'] 			: null;
		$this->productcategory_dependency 	= (isset($data['productcategory_dependency'])) 	? (int) $data['productcategory_dependency'] : null;  
		$this->productcategory_property 	= (isset($data['productcategory_property'])) 	? (string) $data['productcategory_property'] 	: null;  
		$this->result 						= (isset($data['result'])) 						? (float) $data['result'] 					: null;
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
				'name'     => 'idproductcategory',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'category_name',
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
				'name'     => 'productcategory_dependency',
				'required' => false,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
					'name' => 'productcategory_property',
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