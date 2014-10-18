<?php

/**
 * ProspectioninterestFilter.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 17/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

/*
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

namespace API\REST\V1\ACL\Salesforce\Prospectioninterest\Filter;

// - ZF2 - //
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Class ProspectioninterestFilter
 * @package API\REST\V1\ACL\Salesforce\Prospectioninterest\Filter
 */
class ProspectioninterestFilter implements InputFilterAwareInterface
{

    /**
     * @var
     */
    protected $inputFilter;

    /**
     * @param InputFilterInterface $inputFilter
     * @return void|InputFilterAwareInterface
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
     * @return InputFilter|InputFilterInterface
     */
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            // idprospectioninterest: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idprospectioninterest',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // iduser: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'iduser',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idtriggerprospection: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idtriggerprospection',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // prospectioninterest_level: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name' => 'prospectioninterest_level',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('1','2','3','4','5','6','7','8','9','10'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 '
                            ),
                        ),
                    ),
                ),
            ));

            // prospectioninterest_date: DataType = DATETIME, NN = true
            $inputFilter->add(array(
                'name' => 'prospectioninterest_date',
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
                        ),
                    ),
                ),
            ));

            // prospectioninterest_note: DataType = TEXT, NN = false
            $inputFilter->add(array(
                'name' => 'prospectioninterest_note',
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}