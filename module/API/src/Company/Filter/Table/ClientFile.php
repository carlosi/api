<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ClientFile implements InputFilterAwareInterface
{
	public $idclientfile;
	public $idclient;
	public $clientfile_url;
	public $clientfile_note;
	public $clientfile_uploaddate;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idclientfile 			= (!empty($data['idclientfile'])) 			? (int) $data['idclientfile'] 				: null;
		$this->idclient 				= (!empty($data['idclient'])) 				? (int) $data['idclient'] 					: null;
		$this->clientfile_url 			= (!empty($data['clientfile_url'])) 		? (string) $data['clientfile_url']  		: null;
		$this->clientfile_note 			= (isset($data['clientfile_note'])) 		? (string) $data['clientfile_note'] 		: null;  
		$this->clientfile_uploaddate 	= (isset($data['clientfile_uploaddate'])) 	? (string) $data['clientfile_uploaddate'] 	: null;  
		$this->result 					= (isset($data['result'])) 					? (float) $data['result']	 				: null;
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
				'name'     => 'idclientfile',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idclient',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'clientfile_url',
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
				'name' => 'clientfile_note',
				'required' => false,
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
					'name'     => 'clientfile_uploaddate',
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