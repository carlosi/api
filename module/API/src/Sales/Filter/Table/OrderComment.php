<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class OrderComment implements InputFilterAwareInterface
{
	public $idordercomment;
	public $idorder;
	public $ordercomment_note;
	public $ordercomment_date;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idordercomment		= (!empty($data['idordercomment'])) 	? (int) $data['idordercomment'] 		: null;
		$this->idorder 				= (!empty($data['idorder'])) 			? (int) $data['idorder'] 				: null;
		$this->ordercomment_note 	= (!empty($data['ordercomment_note'])) 	? (string) $data['ordercomment_note']	: null;  
		$this->ordercomment_date  	= (!empty($data['ordercomment_date'])) 	? (string) $data['ordercomment_date'] 	: null;  
		
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
				'name'     => 'idordercomment',
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
				'name' => 'ordercomment_note',
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
						
						),
					),
				),
			));
			$inputFilter->add(array(
				'name'     => 'ordercomment_date',
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