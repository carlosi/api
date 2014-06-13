<?php

namespace Company\Filter\Table;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class BankOrderTransaction extends InputFilterAwareInterface
{
    public $idbankordertransaction;
    public $idbankaccount;
    public $idorder;
    public $bankordertransaction_amount;
    public $bankordertransaction_date;
    public $bankordertransaction_paymentmethod;
    public $bankordertransaction_last4of_account;

    public $result;

    public function exchangeArray($data){
        $this->idbankordertransaction               = (!empty($data['idbankordertransaction']))                 ? (int) $data['idbankordertransaction']                     : null;
        $this->idbankaccount                        = (!empty($data['idbankaccount']))                          ? (int) $data['idbankaccount']                              : null;
        $this->idorder                              = (!empty($data['idorder']))                                ? (int) $data['idorder']                                    : null;
        $this->bankordertransaction_amount          = (!empty($data['bankordertransaction_amount']))            ? (string) $data['bankordertransaction_amount']             : null;
        $this->bankordertransaction_date            = (!empty($data['bankordertransaction_date']))              ? (string) $data['bankordertransaction_date']               : null;
        $this->bankordertransaction_paymentmethod   = (!empty($data['bankordertransaction_paymentmethod']))     ? (string) $data['bankordertransaction_paymentmethod']      : null;
        $this->bankordertransaction_last4of_account = (!empty($data['bankordertransaction_last4of_account']))   ? (string) $data['bankordertransaction_last4of_account']    : null;
    }

    // Se agrega para editar la tabla en la base de datos "update":
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }


    public function getInputFilter()
    {
        if(!$this->inputFilter)
        {
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
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'idorder',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name' => 'bankordertransaction_amount',
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
                            'min'	=>	'1',
                            'max'	=>	'100'
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name' => 'bankordertransaction_date',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'	=>	'1',
                            'max'	=>	'100'
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name' => 'bankordertransaction_paymentmethod',
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
                            'min'	=>	'1',
                            'max'	=>	'100'
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name' => 'bankordertransaction_last4of_account',
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
                            'min'	=>	'1',
                            'max'	=>	'100'
                        ),
                    ),
                ),
            ));
        }
    }
}