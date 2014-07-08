<?php

namespace Company\ACL\BankOrderTransaction\Filter;

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

            $inputFilter->add(array(
                'name'     => 'idbankordertransaction',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'idbankaccount',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'idorder',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

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
                            'min'      => 1,
                            'max'      => 65,
                        ),
                    ),
                ),
            ));

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
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ),
                    ),
                ),
            ));


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