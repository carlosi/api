<?php 

namespace Manufacture\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductionOrderItem implements InputFilterAwareInterface
{
	public $idproductionorderitem;
	public $idproductionteam;
    public $idorderitem;
    public $productionorderitem_dateinit;
    public $productionorderitem_datedelivery;
    public $productionorderitem_note;
    public $productionorderitem_status;

	public $result;
	
	public function exchangeArray($data)
	{
		$this->idproductionorderitem		        = (!empty($data['idproductionorderitem'])) 	            ? (int) $data['idproductionorderitem'] 	                : null;
		$this->idproductionteam 	                = (!empty($data['idproductionteam'])) 		            ? (int) $data['idproductionteam'] 		                : null;
        $this->idorderitem 	                        = (!empty($data['idorderitem'])) 		                ? (int) $data['idorderitem'] 			                : null;
        $this->productionorderitem_dateinit 	    = (!empty($data['productionorderitem_dateinit'])) 		? (string) $data['productionorderitem_dateinit'] 		: null;
        $this->productionorderitem_datedelivery     = (!empty($data['productionorderitem_datedelivery'])) 	? (string) $data['productionorderitem_datedelivery'] 	: null;
        $this->productionorderitem_note 	        = (!empty($data['productionorderitem_note'])) 		    ? (string) $data['productionorderitem_note'] 			: null;
        $this->productionorderitem_status 	        = (!empty($data['productionorderitem_status'])) 		? (string) $data['productionorderitem_status'] 			: null;

		$this->result 			                    = (!empty($data['result'])) 			                ? (float) $data['result'] 	    		                : null;
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
				'name'     => 'idproductionorderitem',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idproductionteam',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));
			$inputFilter->add(array(
				'name'     => 'idorderitem',
				'required' => true,
				'filters'  => array(
					array('name' => 'Int'),
				),
			));

            $inputFilter->add(array(
                'name'     => 'productionorderitem_dateinit',
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
                'name'     => 'productionorderitem_datedelivery',
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
                'name'     => 'productionorderitem_note',
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
                'name'     => 'productionorderitem_status',
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

			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}

?>