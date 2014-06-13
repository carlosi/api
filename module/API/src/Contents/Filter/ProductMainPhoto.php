<?php 

namespace Contents\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductMainPhoto implements InputFilterAwareInterface
{
	public $idproductmainphoto;
	public $idproductmain;

	public $productmainphoto_url;
	public $productmainphoto_width;
    public $productmainphoto_height;
    public $productmainphoto_status;
	
	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproductmainphoto 		= (!empty($data['idproductmainphoto'])) 		? (int) $data['idproductmainphoto'] 		: null;
		$this->idproductmain 			= (!empty($data['idproductmain'])) 				? (int) $data['idproductmain'] 				: null;
		$this->productmainphoto_url 	= (!empty($data['productmainphoto_url'])) 		? (string) $data['productmainphoto_url'] 	: null;
        $this->productmainphoto_width 	= (!empty($data['productmainphoto_width'])) 		? (string) $data['productmainphoto_width'] 	: null;
        $this->productmainphoto_height 	= (!empty($data['productmainphoto_height'])) 		? (string) $data['productmainphoto_height'] 	: null;
        $this->productmainphoto_status 	= (!empty($data['productmainphoto_status'])) 		? (string) $data['productmainphoto_status'] 	: null;

		
		$this->result 					= (isset($data['result'])) 						? (float) $data['result'] 					: null;
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
				'name'     => 'idproductmainphoto',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproductmain',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));

			$inputFilter->add(array(
				'name' => 'productmainphoto_url',
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
							
						),
					),
				),
			));
			$inputFilter->add(array(
				'name'     => 'productmainphoto_width',
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
                'name'     => 'productmainphoto_height',
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
                'name'     => 'productmainphoto_status',
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