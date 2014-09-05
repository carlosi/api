<?php

/**
 * ShippingFilter.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
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

namespace API\REST\V1\ACL\Shipping\Shipping\Filter;

// - ZF2 - //
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Class ShippingFilter
 * @package API\REST\V1\ACL\Shipping\Shipping\Filter
 */
class ShippingFilter implements InputFilterAwareInterface
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

            // idshipping: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idshipping',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            // shipping_tracking: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name'     => 'shipping_tracking',
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
                            'max'      => 45,
                        ),
                    ),
                ),
            ));

            // transport_company: DataType = ENUM, NN = false
            $inputFilter->add(array(
                'name'     => 'transport_company',
                'required' => false,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('FEDEX','ESTAFETA','DHL','UPS','PRIVATE','OTHER','EMS','CORREOS DE MÉXICO','SEPOMEX'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: FEDEX | ESTAFETA | DHL | UPS | PRIVATE | OTHER | EMS | CORREOS DE MÉXICO | SEPOMEX '
                            ),
                        ),
                    ),
                ),
            ));

            // shipping_date: DataType = DATETIME, NN = true
            $inputFilter->add(array(
                'name'     => 'shipping_date',
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

            // shipping_datecompromise: DataType = DATETIME, NN = false
            $inputFilter->add(array(
                'name'     => 'shipping_datecompromise',
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

            // shipping_daterealdelivery: DataType = DATETIME, NN = false
            $inputFilter->add(array(
                'name'     => 'shipping_daterealdelivery',
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

            // shipping_status: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name'     => 'shipping_status',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('pending','transit','complete'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: pending | transit | complete '
                            ),
                        ),
                    ),
                ),
            ));

            // sender_iso_codecountry: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_iso_codecountry',
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

            // sender_iso_codephone: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_iso_codephone',
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

            // sender_name: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_name',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // sender_addressee_cellular: DataType = VARCHAR(18), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_addressee_cellular',
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
                            'max'      => 18,
                        ),
                    ),
                ),
            ));

            // sender_addressee_phone: DataType = VARCHAR(18), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_addressee_phone',
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
                            'max'      => 18,
                        ),
                    ),
                ),
            ));

            // sender_address2: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_address2',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // sender_city: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_city',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // sender_state: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_state',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // sender_zipcode: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'sender_zipcode',
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

            // addressee_iso_codecountry: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_iso_codecountry',
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

            // addressee_iso_codephone: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_iso_codephone',
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

            // addressee_name: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_name',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // addressee_addressee_cellular: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_addressee_cellular',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // addressee_addressee_phone: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_addressee_phone',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // addressee_address2: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_address2',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // addressee_city: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_city',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // addressee_state: DataType = VARCHAR(145), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_state',
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
                            'max'      => 145,
                        ),
                    ),
                ),
            ));

            // addressee_zipcode: DataType = VARCHAR(5), NN = false
            $inputFilter->add(array(
                'name'     => 'addressee_zipcode',
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}