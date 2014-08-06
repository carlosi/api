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

namespace Company\V1\REST\ACL\User\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;

class UserFilter implements InputFilterAwareInterface
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
            $factory     = new InputFactory();

            // iduser: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'iduser',
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

            // user_nickname: DataType = VARCHAR(245), NN = true
            $inputFilter->add(array(
                'name' => 'user_nickname',
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
                                'max' => '245',
                        ),
                    ),
                ),
            ));

            // user_password: DataType = TEXT, NN = true
            $inputFilter->add(array(
                'name' => 'user_password',
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
                        ),
                    ),
                ),
            ));

            // user_type: DataType = ENUM, NN = true
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_type',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('human','system'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: human | system'
                             ),
                        ),
                    ),
                ),
            )));

            // user_status: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name' => 'user_status',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('pending','active','suspended','inactive'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: pending | active | suspended | inactive '
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

