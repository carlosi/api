<?php 

namespace Company\ACL\ExpenseItem\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ExpenseItemFilter implements InputFilterAwareInterface
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
                    'name'     => 'idexpenseitem',
                    'required' => false,
                    'filters'  => array(
                                    array('name' => 'Int'),
                    ),
                ));

                $inputFilter->add(array(
                    'name'     => 'idexpensecategory',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));


                $inputFilter->add(array(
                    'name' => 'expenseitem_name',
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
                                'max' => '255',
                            ),
                        ),
                    ),
                ));

                $inputFilter->add(array(
                    'name' => 'expenseitem_description',
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
                                'max' => '245',
                            ),
                        ),
                    ),
                ));

                $inputFilter->add(array(
                    'name' => 'expenseitem_cause',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('operation','sale','purchasedgoods'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: operation | sale | purchasedgoods '
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

?>

