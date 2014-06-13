<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class MxTaxDocument implements InputFilterAwareInterface
{
	public $idmxtaxdocument;
	public $idclienttax;
	public $idorder;
	public $mxtaxdocument_folio;
	public $mxtaxdocument_type;
	public $payment_method;
	public $mxtaxdocument_status;
	public $mxtaxdocument_url_xml;
	public $mxtaxdocument_url_pdf;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idmxtaxdocument 			= (!empty($data['idmxtaxdocument'])) 		? (int) $data['idmxtaxdocument'] 			: null;
		$this->idclienttax 				= (!empty($data['idclienttax'])) 			? (int) $data['idclienttax'] 				: null;
		$this->idorder  				= (!empty($data['idorder'])) 				? (string) $data['idorder'] 				: null;  
		$this->mxtaxdocument_folio  	= (!empty($data['mxtaxdocument_folio'])) 	? (string) $data['mxtaxdocument_folio'] 	: null;  
		$this->mxtaxdocument_version  	= (!empty($data['mxtaxdocument_version'])) 	? (string) $data['mxtaxdocument_version'] 	: null;  
		$this->mxtaxdocument_type  		= (!empty($data['mxtaxdocument_type'])) 	? (string) $data['mxtaxdocument_type'] 		: null;  
		$this->mxtaxdocument_status 	= (!empty($data['mxtaxdocument_status'])) 	? (string) $data['mxtaxdocument_status'] 	: null;  
		$this->mxtaxdocument_url_xml  	= (!empty($data['mxtaxdocument_url_xml'])) 	? (string) $data['mxtaxdocument_url_xml'] 	: null;  
		$this->mxtaxdocument_url_pdf  	= (!empty($data['mxtaxdocument_url_pdf'])) 	? (string) $data['mxtaxdocument_url_pdf'] 	: null;  
		
		$this->result 					= (isset($data['result'])) 					? (float) $data['result'] 					: null;
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
				'name'     => 'idmxtaxdocument',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idclienttax',
				'required' => true,
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
				'name' => 'mxtaxdocument_folio',
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
							'min'	=>	'1',
							'max'	=>	'100'
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'mxtaxdocument_version',
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
							'min'	=>	'1',
							'max'	=>	'100',
						),
					),
				),
			));
			$inputFilter->add(array(
					'name' => 'mxtaxdocument_type',
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
							'min'	=>	'1',
							'max'	=>	'100'
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'mxtaxdocument_status',
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
							'min'	=>	'1',
							'max'	=>	'100'
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'mxtaxdocument_url_xml',
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
							'min'	=>	'1',
							'max'	=>	'100'
						),
					),
				),
			));
			$inputFilter->add(array(
				'name' => 'mxtaxdocument_url_pdf',
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
							'min'	=>	'1',
							'max'	=>	'100'
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