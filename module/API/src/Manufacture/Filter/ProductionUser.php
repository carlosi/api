<?php 

namespace Manufacture\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ProductionUser implements InputFilterAwareInterface
{
	public $idproductionuser;
    public $idproductionteam;
    public $iduser;

	public $result;
	
	public function exchangeArray($data)
	{
        $this->idproductionuser		= (!empty($data['idproductionuser']))   ? (int) $data['idproductionuser'] 	: null;
        $this->idproductionteam		= (!empty($data['idproductionteam'])) 	? (int) $data['idproductionteam'] 	: null;
		$this->iduser 	            = (!empty($data['iduser'])) 	        ? (int) $data['iduser'] 	        : null;

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
				'name'     => 'idproductionuser',
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
                'name'     => 'iduser',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}

?>