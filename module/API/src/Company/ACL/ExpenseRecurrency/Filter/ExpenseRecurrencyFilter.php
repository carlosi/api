<?php 

namespace Company\ACL\ExpenseRecurrency\Filter;

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

                $inputFilter->add(array(
                    'name'     => 'idexpenserecurrency',
                    'required' => false,
                    'filters'  => array(
                                    array('name' => 'Int'),
                    ),
                ));

                $inputFilter->add(array(
                    'name'     => 'idexpenseitem',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));


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
                                'min' => '1',
                                'max' => '255',
                            ),
                        ),
                    ),
                ));

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
                                'min' => '1',
                                'max' => '245',
                            ),
                        ),
                    ),
                ));

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
                                'min' => '1',
                                'max' => '245',
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

