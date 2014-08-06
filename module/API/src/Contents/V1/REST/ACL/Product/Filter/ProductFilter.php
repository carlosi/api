<?php

/**
 * Los comentarios de cada "$inputFilter" son datos del SQL Model dna.
 * En algunos casos el parámetro Not Null es igual a verdadero (NN = true), sin embargo,
 * en algunos filtros, el  parámetro 'require' es 'false',
 * esto se debe a que el campo no es un dato requerido para el usuario, sin embargo,
 * estos datos nosotros los seteamos internamente.
 * Por ejemplo el id del PK, es NN = true en nuetsro SQL Model dna,
 * pero en los filtros ($inputFilter) el parámetro require es falso ('require' => 'false') para que
 * en la tabla el PK sea autoincrementable.
 * Otro ejemplo es el id relacionado a otra tabla,
 * lo seteamos en el Controlador por medio del token, desde el cual obtenemos el idcompany.
 */

namespace Contents\V1\REST\ACL\Product\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ProductFilter implements InputFilterAwareInterface
{

    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }
    
	public function getInputFilter()
	{
        if(!$this->inputFilter)
        {
            $inputFilter = new InputFilter();

            // idproduct: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idproduct',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idproductmain: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idproductmain',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // property_array: DataType = TEXT, NN = true
            $inputFilter->add(array(
                'name'     => 'property_array',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                        ),
                    ),
                ),
            ));

            // product_status: DataType = ENUM, NN = false
            $inputFilter->add(array(
                'name' => 'product_status',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('ACTIVE','INACTIVE'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: ACTIVE | INACTIVE '
                            ),
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

