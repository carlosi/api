<?php

/**
 * OrderFilter.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
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

namespace API\REST\V1\ACL\Sales\Order\Filter;

// - ZF2 - //
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Class OrderFilter
 * @package API\REST\V1\ACL\Sales\Order\Filter
 */
class OrderFilter implements InputFilterAwareInterface
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

            // idorder: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idorder',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idbranch: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idbranch',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idclient: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idclient',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // created_at: DataType = DATE, NN = true
            $inputFilter->add(array(
                'name'     => 'created_at',
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

            // order_status: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name'     => 'order_status',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('COMPLETE','INCOMPLETE'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: COMPLETE | INCOMPLETE '
                            ),
                        ),
                    ),
                ),
            ));

            // order_payment: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name'     => 'order_payment',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('PAID','UNPAID'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: PAID | UNPAID '
                            ),
                        ),
                    ),
                ),
            ));

            // order_paymentmode: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name'     => 'order_paymentmode',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('UNIQUE','PARTIAL'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: UNIQUE | PARTIAL '
                            ),
                        ),
                    ),
                ),
            ));

            // order_delivery: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name'     => 'order_delivery',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('LOCALMODE','SHIPMODE','TRANSIT','FINISHED','TRANSITTOBRANCH'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: LOCALMODE | SHIPMODE | TRANSIT | FINISHED | TRANSITTOBRANCH '
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