<?php 

namespace Company\ACL\User\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;

class UserFilter implements InputFilterAwareInterface
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
                    $factory     = new InputFactory();

                    $inputFilter->add(array(
                        'name'     => 'iduser',
                        'required' => false,
                        'filters'  => array(
                                        array('name' => 'Int'),
                        ),
                    ));
                    
                    $inputFilter->add(array(
                        'name'     => 'idcompany',
                        'required' => false,
                        'filters'  => array(
                                array('name' => 'Int'),
                        ),
                    ));
                    
                    $inputFilter->add(array(
                        'name' => 'user_nickname',
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
                                        'min' => '1',
                                        'max' => '100',
                                ),
                            ),
                        ),
                    ));
                    
                    $inputFilter->add(array(
                        'name' => 'user_password',
                        'required' => true,
                        'filters' => array(
                                array('name' => 'StripTags'),
                                array('name' => 'StringTrim')
                        ),
                        'validators' => array(
                            array(
                                'name' => '\Zend\Validator\PasswordStrength',
                            ),

                            
                        ),
                    ));
                    
                    $inputFilter->add($factory->createInput(array(
                        'name' => 'user_type',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim')
                        ),
                        'validators' => array(
                            array(
                                'name' => 'Zend\Validator\InArray',
                                'options' => array(
                                    'haystack' => array('human','system'),
                                    'messages' => array(
                                        'notInArray' => 'is not a valid input. Valid inputs: human | system'
                                     ),
                                ),
                            ),
                        ),
                    )));
                    
                    $inputFilter->add(array(
                        'name' => 'user_status',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim')
                        ),
                        'validators' => array(
                            array(
                                'name' => 'Zend\Validator\InArray',
                                'options' => array(
                                    'haystack' => array('pending','active','suspended','inactive'),
                                    'messages' => array(
                                        'notInArray' => 'is not a valid input. Valid inputs: pending | active | suspended | inactive '
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

