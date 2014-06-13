<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class UserAcl implements InputFilterAwareInterface
{
	public $iduseracl;
	public $iduser;
	public $module_name;
	public $user_accesslevel;

	public $result;
	
	public function exchangeArray($data)
	{
		$this->iduseracl 			= (!empty($data['iduseracl'])) 		    ? (int) $data['iduseracl'] 			    : null;
		$this->iduser 		        = (!empty($data['iduser'])) 		    ? (int) $data['iduser'] 			    : null;
		$this->module_name 	        = (!empty($data['module_name']))        ? (string) $data['module_name']         : null;
		$this->user_accesslevel 	= (!empty($data['user_accesslevel'])) 	? (string) $data['user_accesslevel'] 	: null;

		$this->result 			    = (!empty($data['result'])) 		    ? (float) $data['result']	 		    : null;
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
				'name'     => 'iduseracl',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'iduser',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'module_name',
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
				'name' => 'user_accesslevel',
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