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

namespace REST\v1\Expense\ACL\ExpenseRecurrency\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ExpenseRecurrencyFilter implements InputFilterAwareInterface
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

                // idexpenserecurrency: DataType = INT, PK = true, NN = true, AI = true
                $inputFilter->add(array(
                    'name'     => 'idexpenserecurrency',
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

                // expenserecurrency_comment: DataType = TEXT, NN = false
                $inputFilter->add(array(
                    'name' => 'expenserecurrency_comment',
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

                // expenserecurrency_themequantity: DataType = DECIMAL(10,2), NN = true
                $inputFilter->add(array(
                    'name' => 'expenserecurrency_themequantity',
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

                // expenserecurrency_themevalue: DataType = DECIMAL(10,2), NN = true
                $inputFilter->add(array(
                    'name' => 'expenserecurrency_themevalue',
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

                // expenserecurrency_cycle: DataType = ENUM, NN = true
                $inputFilter->add(array(
                    'name' => 'expenserecurrency_cycle',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('weekly','monthly','annually'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: weekly | monthly | annually '
                                ),
                            ),
                        ),
                    ),
                ));

                // expenserecurrency_applyeach: DataType = TEXT, NN = true
                $inputFilter->add(array(
                    'name' => 'expenserecurrency_applyeach',
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

