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

namespace REST\v1\Project\ACL\Project\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ProjectFilter implements InputFilterAwareInterface
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

                // idproject: DataType = INT, PK = true, NN = true, AI = true
                $inputFilter->add(array(
                    'name'     => 'idproject',
                    'required' => false,
                    'filters'  => array(
                                    array('name' => 'Int'),
                    ),
                ));

                // iddepartament: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'iddepartament',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // project_dependency: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'project_dependency',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // iddepartament: DataType = VARCHAR(245), NN = false
                $inputFilter->add(array(
                    'name' => 'project_name',
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
                                'max' => '245',
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

