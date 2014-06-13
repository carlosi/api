<?php 

namespace Manufacture\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductionTeam implements InputFilterAwareInterface
{
	public $idproductionteam;
    public $idcompany;
    public $productionteam_name;

	public $result;
	
	public function exchangeArray($data)
	{
        $this->idproductionteam		    = (!empty($data['idproductionteam'])) 	    ? (int) $data['idproductionteam'] 	        : null;
        $this->idcompany		        = (!empty($data['idcompany'])) 	            ? (int) $data['idcompany'] 	                : null;
		$this->productionteam_name 	    = (!empty($data['productionteam_name'])) 	? (string) $data['productionteam_name'] 	: null;

		$this->result 			        = (!empty($data['result'])) 			    ? (float) $data['result'] 	    		: null;
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
				'name'     => 'idproductionteam',
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
                'name'     => 'productionteam_name',
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