<?php 

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class BranchUser implements InputFilterAwareInterface
{
	public $idbranch_user;
	public $idbranch;
	public $iduser;

	public $result;
	
	public function exchangeArray($data)
	{
		$this->idbranch_user 	= (!empty($data['idbranch_user'])) 		? (int) $data['idbranch_user'] 		: null;
		$this->idbranch 		= (!empty($data['idbranch'])) 		    ? (int) $data['idbranch'] 			: null;
		$this->iduser 	        = (!empty($data['iduser']))             ? (int) $data['iduser']             : null;

        $this->result 			= (!empty($data['result'])) 		    ? (float) $data['result']	 		: null;
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
				'name'     => 'idbranch_user',
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