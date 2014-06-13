<?php 

namespace Sales\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class OrderShipping implements InputFilterAwareInterface
{
	public $idshipping;
	public $idorder;
	public $shipping_address;
	public $shipping_tracking;
	public $transport_company;
	public $shipping_date;
    public $shipping_datecompromise;
    public $shipping_daterealdelivery;
    public $shipping_iso_codecountry;
    public $shipping_iso_codephone;
    public $shipping_addressee;
    public $shipping_addressee_cellular;
    public $shipping_addressee_phone;
    public $shipping_address2;
    public $shipping_city;
    public $shipping_state;
    public $shipping_zipcode;

	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idshipping 			            = (!empty($data['idshipping'])) 		            ? (int) $data['idshipping'] 			        : null;
		$this->idorder 				            = (!empty($data['idorder'])) 			            ? (int) $data['idorder'] 				        : null;
		$this->shipping_address 	            = (!empty($data['shipping_address'])) 	            ? (string) $data['shipping_address'] 	        : null;
		$this->shipping_tracking 	            = (!empty($data['shipping_tracking']))          	? (string) $data['shipping_tracking'] 	        : null;
		$this->transport_company 	            = (!empty($data['transport_company'])) 	            ? (string) $data['transport_company'] 	        : null;
		$this->shipping_date 		            = (!empty($data['shipping_date'])) 		            ? (string) $data['shipping_date'] 		        : null;
		$this->shipping_datecompromise 			= (!empty($data['shipping_datecompromise'])) 		? (string) $data['shipping_datecompromise'] 	: null;
        $this->shipping_daterealdelivery 		= (!empty($data['shipping_daterealdelivery'])) 		? (string) $data['shipping_daterealdelivery'] 	: null;
        $this->shipping_iso_codecountry 		= (!empty($data['shipping_iso_codecountry'])) 		? (string) $data['shipping_iso_codecountry'] 	: null;
        $this->shipping_iso_codephone 			= (!empty($data['shipping_iso_codephone'])) 		? (string) $data['shipping_iso_codephone'] 		: null;
        $this->shipping_addressee 				= (!empty($data['shipping_addressee'])) 			? (string) $data['shipping_addressee'] 			: null;
        $this->shipping_addressee_cellular 		= (!empty($data['shipping_addressee_cellular'])) 	? (string) $data['shipping_addressee_cellular'] : null;
        $this->shipping_addressee_phone 		= (!empty($data['shipping_addressee_phone'])) 		? (string) $data['shipping_addressee_phone'] 	: null;
        $this->shipping_address2 				= (!empty($data['shipping_address2'])) 			    ? (string) $data['shipping_address2'] 			: null;
        $this->shipping_city 			    	= (!empty($data['shipping_city'])) 			        ? (string) $data['shipping_city'] 				: null;
        $this->shipping_state 			    	= (!empty($data['shipping_state'])) 			    ? (string) $data['shipping_state'] 				: null;
        $this->shipping_zipcode 				= (!empty($data['shipping_zipcode'])) 			    ? (string) $data['shipping_zipcode'] 			: null;

        $this->result 				            = (!empty($data['result'])) 			            ? (float) $data['result'] 				        : null;
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
				'name'     => 'idshipping',
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
					'name' => 'shipping_address',
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
											'max' => '1000',
									),
							),
					),
			));
			$inputFilter->add(array(
				'name' => 'shipping_tracking',
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
				'name'     => 'transport_company',
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
				'name'     => 'shipping_date',
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
                'name'     => 'shipping_datecompromise',
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

                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_daterealdelivery',
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

                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_iso_codecountry',
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
                            'max' => '5',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_iso_codephone',
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
                            'max' => '5',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_addressee',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_addressee_cellular',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_addressee_phone',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_address',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_address2',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_city',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_state',
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
                            'max' => '145',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'shipping_zipcode',
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
                            'max' => '5',
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