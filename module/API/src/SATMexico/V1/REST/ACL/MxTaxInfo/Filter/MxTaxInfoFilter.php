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

namespace SATMexico\V1\REST\ACL\MxTaxInfo\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class MxTaxInfoFilter implements InputFilterAwareInterface
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

                // idmxtaxinfo: DataType = INT, PK = true, NN = true, AI = false
                $inputFilter->add(array(
                    'name'     => 'idmxtaxinfo',
                    'required' => false,
                    'filters'  => array(
                                    array('name' => 'Int'),
                    ),
                ));

                // idcompany: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'idcompany',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // mxtaxinfo_rfc: DataType = VARCHAR(45), NN = true
                $inputFilter->add(array(
                    'name' => 'mxtaxinfo_rfc',
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
                                'max' => '45',
                            ),
                        ),
                    ),
                ));

                // mxtaxinfo_razonsocial: DataType = VARCHAR(65), NN = true
                $inputFilter->add(array(
                    'name' => 'mxtaxinfo_razonsocial',
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
                                'max' => '65',
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

