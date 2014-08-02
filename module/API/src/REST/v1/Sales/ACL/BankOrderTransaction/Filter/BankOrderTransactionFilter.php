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

namespace REST\v1\Sales\ACL\BankOrderTransaction\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class BankOrderTransactionFilter implements InputFilterAwareInterface
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

            // idbankordertransaction: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idbankordertransaction',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idbankaccount: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idbankaccount',
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

            // bankordertransaction_amount: DataType = DECIMAL, NN = true
            $inputFilter->add(array(
                'name'     => 'bankordertransaction_amount',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Float',
                        'options' => array(
                            'min' => 0,
                            'locale' => 'es-MX'
                        ),
                    ),
                ),
            ));

            // bankordertransaction_date: DataType = DATETIME, NN = false
            $inputFilter->add(array(
                'name'     => 'bankordertransaction_date',
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

            // bankordertransaction_paymentmethod: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name'     => 'bankordertransaction_paymentmethod',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'InArray',
                        'options' => array(
                            'haystack' => array('No identificado','transferencia electrónica','efectivo','Tarjeta de crédito','Tarjeta de débito','Cheque nomitativo','monedero electrónico'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: No identificado | transferencia electrónica | efectivo | Tarjeta de crédito | Tarjeta de débito | Cheque nomitativo | monedero electrónico'
                            ),
                        ),
                    ),
                ),
            ));

            // bankordertransaction_last4of_account: DataType = VARCHAR(4), NN = true
            $inputFilter->add(array(
                'name'     => 'bankordertransaction_last4of_account',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 4,
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}