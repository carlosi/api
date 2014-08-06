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

namespace Sales\V1\REST\ACL\OrderFile\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class OrderFileFilter implements InputFilterAwareInterface
{

    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            // idorderfile: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idorderfile',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idorder: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idorder',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // orderfile_url: DataType = TEXT, NN = true
            $inputFilter->add(array(
                'name'     => 'orderfile_url',
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

            // orderfile_note: DataType = TEXT, NN = false
            $inputFilter->add(array(
                'name'     => 'orderfile_note',
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
                        ),
                    ),
                ),
            ));

            // orderfile_uploaddate: DataType = DATETIME, NN = true
            $inputFilter->add(array(
                'name'     => 'orderfile_uploaddate',
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}