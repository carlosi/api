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

namespace Company\V1\REST\ACL\Client\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;


class ClientFilter implements InputFilterAwareInterface
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
            $factory     = new InputFactory();


            // idclient: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idclient',
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

            // client_iso_codecountry: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'client_iso_codecountry',
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
                            'max'      => 5,
                        ),
                    ),
                ),
            ));

            // client_iso_codephone: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'client_iso_codephone',
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
                            'max'      => 5,
                        ),
                    ),
                ),
            ));

            // client_fullname: DataType = VARCHAR(245), NN = true
            $inputFilter->add(array(
                'name'     => 'client_fullname',
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
                            'min'      => 1,
                            'max'      => 245,
                        ),
                    ),
                ),
            ));

            // client_email: DataType = VARCHAR(65), NN = false
            $inputFilter->add(array(
                'name'     => 'client_email',
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
                            'max'      => 65,
                        ),
                    ),
                ),
            ));

            // client_email2: DataType = VARCHAR(65), NN = false
            $inputFilter->add(array(
                'name'     => 'client_email2',
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
                            'max'      => 65,
                        ),
                    ),
                ),
            ));

            // client_password: DataType = TEXT, NN = false
            $inputFilter->add(array(
                'name'     => 'client_password',
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

            // client_cellular: DataType = VARCHAR(16), NN = false
            $inputFilter->add(array(
                'name'     => 'client_cellular',
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
                            'max'      => 16,
                        ),
                    ),
                ),
            ));

            // client_phone: DataType = VARCHAR(16), NN = false
            $inputFilter->add(array(
                'name'     => 'client_phone',
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
                            'max'      => 16,
                        ),
                    ),
                ),
            ));

            // client_language: DataType = VARCHAR(6), NN = false
            $inputFilter->add(array(
                'name'     => 'client_language',
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
                            'max'      => 6,
                        ),
                    ),
                ),
            ));

            // client_status: DataType = ENUM, NN = true
            $inputFilter->add($factory->createInput(array(
                'name' => 'client_status',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('pending','active','suspended','fraud'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: pending | active | suspended | fraud'
                            ),
                        ),
                    ),
                ),
            )));

            // client_type: DataType = ENUM, NN = false
            $inputFilter->add($factory->createInput(array(
                'name' => 'client_type',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('NORMAL','GENERALPUBLIC','INVENTORYMANAGER'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: NORMAL | GENERALPUBLIC | INVENTORYMANAGER'
                            ),
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}