<?php 

namespace Shared\V1\REST\FormInputRules;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class TableFilterInput implements InputFilterAwareInterface
{
	public $table_like;
	public $table_order;
	public $order_by;
	public $order;
	public $column_like;
	public $words;
	
	
	public function exchangeArray($data)
	{
		$this->table_like 		= (!empty($data['table_like'])) 		? (string) $data['table_like'] 	: null;
		$this->table_order 		= (!empty($data['table_order'])) 		? (string) $data['table_order'] : null;
		$this->order_by 		= (!empty($data['order_by'])) 			? (string) $data['order_by'] 	: null;
		$this->order	 		= (!empty($data['order'])) 				? (string) $data['order'] 		: 'DESC';
		$this->column_like	 	= (!empty($data['column_like'])) 		? (string) $data['column_like'] : null;
		$this->words	 		= (!empty($data['words'])) 				? (string) $data['words'] 		: null;
		
		
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
				'name' => 'table_like',
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
					'name' => 'table_order',
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
					'name' => 'order_by',
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
					'name' => 'order',
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
											'min' => '3',
											'max' => '4',
									),
							),
					),
			));
			
			$inputFilter->add(array(
					'name' => 'column_like',
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
					'name' => 'words',
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