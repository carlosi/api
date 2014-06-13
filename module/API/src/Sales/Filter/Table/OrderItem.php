<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class OrderItem implements InputFilterAwareInterface
{
	public $idorderitem;
	public $idorder;
	public $idproduct;
	public $quantity;
	public $value;
	
	
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idorderitem 	= (!empty($data['idorderitem'])) 	? (int) $data['idorderitem'] 	: null;
		$this->idorder 		= (!empty($data['idorder'])) 		? (int) $data['idorder'] 		: null;
		$this->idproduct 	= (!empty($data['idproduct'])) 		? (int) $data['idproduct'] 		: null;  
		$this->quantity 	= (!empty($data['quantity'])) 		? (float) $data['quantity'] 	: null;  
		$this->value 		= (!empty($data['value'])) 			? (float) $data['value']		: null;  
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
				'name'     => 'idorderitem',
				'required' => false,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idorder',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproduct',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'quantity',
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
				'name'     => 'value',
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