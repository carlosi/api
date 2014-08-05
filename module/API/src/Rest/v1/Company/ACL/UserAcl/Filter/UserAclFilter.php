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

namespace Company\ACL\UserAcl\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;

class UserAclFilter implements InputFilterAwareInterface
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

            // iduseracl: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'iduseracl',
                'required' => false,
                'filters'  => array(
                                array('name' => 'Int'),
                ),
            ));

            // iduser: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'iduser',
                'required' => false,
                'filters'  => array(
                        array('name' => 'Int'),
                ),
            ));

            // module_name: DataType = ENUM, NN = true
            $inputFilter->add($factory->createInput(array(
                'name' => 'module_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('basic','sales','company','manufacture','contents'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: basic | sales | company | manufacture | contents '
                             ),
                        ),
                    ),
                ),
            )));

            // user_accesslevel: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name' => 'user_accesslevel',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('1','2','3','4','5'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: 1 | 2 | 3 | 4 | 5 '
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

