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

namespace Expense\V1\REST\ACL\ExpenseTransaction\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ExpenseTransactionFilter implements InputFilterAwareInterface
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

                // idexpensetransaction: DataType = INT, PK = true, NN = true, AI = true
                $inputFilter->add(array(
                    'name'     => 'idexpensetransaction',
                    'required' => false,
                    'filters'  => array(
                                    array('name' => 'Int'),
                    ),
                ));

                // idexpenseitem: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'idexpenseitem',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // expensetransaction_status: DataType = ENUM, NN = true
                $inputFilter->add(array(
                    'name' => 'expensetransaction_status',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('suggestion','pending','completed'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: suggestion | pending | completed '
                                ),
                            ),
                        ),
                    ),
                ));

                // expensetransaction_comment: DataType = TEXT, NN = false
                $inputFilter->add(array(
                    'name' => 'expensetransaction_comment',
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

                // expensetransaction_quantity: DataType = DECIMAL(10,2), NN = true
                $inputFilter->add(array(
                    'name' => 'expensetransaction_quantity',
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

                // expensetransaction_value: DataType = DECIMAL(10,2), NN = true
                $inputFilter->add(array(
                    'name' => 'expensetransaction_value',
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
                                'min' => '1',
                                'max' => '245',
                            ),
                        ),
                    ),
                ));

                // expensetransaction_date: DataType = DATETIME, NN = true
                $inputFilter->add(array(
                    'name' => 'expensetransaction_date',
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

?>

