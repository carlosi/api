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

namespace Contents\V1\REST\ACL\ProductMainPhoto\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ProductMainPhotoFilter implements InputFilterAwareInterface
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

            // idproductmainphoto: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idproductmainphoto',
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

            // productmainphoto_url: DataType = TEXT, NN = true
            $inputFilter->add(array(
                'name'     => 'productmainphoto_url',
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

            // productmainphoto_width: DataType = VARCHAR(35), NN = false
            $inputFilter->add(array(
                'name'     => 'productmainphoto_width',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 35,
                        ),
                    ),
                ),
            ));

            // productmainphoto_height: DataType = VARCHAR(35), NN = false
            $inputFilter->add(array(
                'name'     => 'productmainphoto_height',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 35,
                        ),
                    ),
                ),
            ));

            // productmainphoto_status: DataType = ENUM, NN = false
            $inputFilter->add(array(
                'name' => 'productmainphoto_status',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('pending','rejected','active','revision'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: pending | rejected | active | revision'
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
	
}

?>

