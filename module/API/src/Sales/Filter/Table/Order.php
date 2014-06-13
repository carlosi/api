<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class Order implements InputFilterAwareInterface
{
	public $idorder;
	public $idbranch;
	public $idclient;
	public $created_at;
	public $order_status;
	public $order_payment;
	public $order_paymentmode;
	public $order_delivery;
	
	public $branch_name; 		// de <branch> table
	public $client_fullname; 	// de <client> table
	public $client_email; 		// de <client> table
	
	public $totalcost; 			// de Expression (function)
	public $totalitems; 		// de Expression (function)
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idorder		= (!empty($data['idorder'])) 		? (int) $data['idorder'] 			: null;
		$this->idbranch 	= (!empty($data['idbranch'])) 		? (int) $data['idbranch'] 			: null;
		$this->idclient 	= (!empty($data['idclient'])) 		? (int) $data['idclient'] 			: null;
		$this->created_at	= (!empty($data['created_at'])) 		? (string) $data['created_at'] 		: null; 
		$this->order_status = (!empty($data['order_status'])) 	? (string) $data['order_status'] 	: null;
		$this->order_payment 	= (!empty($data['order_payment'])) 	? (string) $data['order_payment'] 	: null;
		$this->order_paymentmode 	= (!empty($data['order_paymentmode'])) 	? (string) $data['order_paymentmode'] 	: null;
		$this->order_delivery 	= (!empty($data['order_delivery']))? (string) $data['order_delivery'] 	: null;
		
		$this->branch_name 	= (!empty($data['branch_name']))			? (string) $data['branch_name'] 	: null;
		$this->client_fullname 	= (!empty($data['client_fullname']))	? (string) $data['client_fullname'] : null;
		$this->client_email 	= (!empty($data['client_email']))		? (string) $data['client_email'] 	: null;
		$this->totalcost 	= (!empty($data['totalcost']))		? (float) 	$data['totalcost'] 	: 0;
		$this->totalitems 	= (!empty($data['totalitems']))		? (int) 	$data['totalitems'] : 0;
		$this->result 			= (!empty($data['result'])) 			? (float) $data['result'] 			: null;
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
				'name'     => 'idorder',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idbranch',
				'required' => true,
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
					'name' => 'created_at',
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
					'name' => 'order_status',
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
					'name' => 'order_payment',
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
					'name' => 'order_paymentmode',
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
					'name' => 'order_delivery',
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