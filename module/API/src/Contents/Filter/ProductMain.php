<?php 

namespace Contents\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductMain implements InputFilterAwareInterface
{
	public $idproductmain;
	public $idcompany;
	public $idproductcategory;
	public $productmain_name;
	public $productmain_unit;
	public $productmain_discount;
	public $productmain_eachpieces;
	public $productmain_maxdiscount;
    public $productmain_baseproperty;
    public $productmain_type;


	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproductmain 			= (!empty($data['idproductmain'])) 				? (int) $data['idproductmain'] 					: null;
		$this->idcompany 				= (!empty($data['idcompany'])) 					? (int) $data['idcompany'] 						: null;
		$this->idproductcategory 		= (!empty($data['idproductcategory'])) 			? (int) $data['idproductcategory'] 				: null;
		$this->productmain_name 		= (!empty($data['productmain_name'])) 			? (string) $data['productmain_name'] 			: null;
		$this->productmain_unit 		= (!empty($data['productmain_unit'])) 			? (string) $data['productmain_unit'] 			: null;
		$this->productmain_discount 	= (!empty($data['productmain_discount'])) 		? (int) $data['productmain_discount'] 			: null;
		$this->productmain_eachpieces 	= (!empty($data['productmain_eachpieces'])) 	? (int) $data['productmain_eachpieces'] 		: null;
		$this->productmain_maxdiscount 	= (!empty($data['productmain_maxdiscount'])) 	? (int) $data['productmain_maxdiscount'] 		: null;
        $this->productmain_baseproperty = (!empty($data['productmain_baseproperty'])) 	? (string) $data['productmain_baseproperty'] 	: null;
        $this->productmain_type         = (!empty($data['productmain_type'])) 	? (string) $data['productmain_type'] 	: null;
		$this->result 					= (isset($data['result'])) 						? (float) $data['result'] 						: null;
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
				'name'     => 'idproductmain',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idcompany',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproductcategory',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name' => 'productmain_name',
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
				'name' => 'productmain_unit',
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
				'name'     => 'productmain_discount',
				'required' => false,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
					'name'     => 'productmain_eachpieces',
					'required' => false,
					'filters'  => array(
							array('name' => 'Int'),
					),
			));
			$inputFilter->add(array(
					'name'     => 'productmain_maxdiscount',
					'required' => false,
					'filters'  => array(
							array('name' => 'Int'),
					),
			));
			$inputFilter->add(array(
				'name'     => 'productmain_baseproperty',
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
                'name' => 'productmain_type',
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

			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}

?>