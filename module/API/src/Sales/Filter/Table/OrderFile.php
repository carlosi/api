<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class OrderFile implements InputFilterAwareInterface
{
	public $idorderfile;
	public $idorder;
	public $orderfile_url;
	public $orderfile_note;
	public $orderfile_uploaddate;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idorderfile			= (!empty($data['idorderfile'])) 			? (int) $data['idorderfile'] 				: null;
		$this->idorder 				= (!empty($data['idorder'])) 				? (int) $data['idorder'] 					: null;
		$this->orderfile_url 		= (!empty($data['orderfile_url'])) 			? (string) $data['orderfile_url'] 			: null;
		$this->orderfile_note 		= (isset($data['orderfile_note'])) 			? (string) $data['orderfile_note'] 			: null;  
		$this->orderfile_uploaddate = (isset($data['orderfile_uploaddate'])) 	? (string) $data['orderfile_uploaddate'] 	: null; 
		
		$this->result 				= (isset($data['result'])) 					? (float) $data['result']		 			: null;
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
				'name'     => 'idorderfile',
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
				'name' => 'orderfile_url',
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
				'name' => 'orderfile_note',
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
							'min' => '1',
							'max' => '100',
						),
					),
				),
			));  	
			$inputFilter->add(array(
				'name'     => 'orderfile_uploaddate',
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