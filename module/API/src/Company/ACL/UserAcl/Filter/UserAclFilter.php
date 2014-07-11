<?php 

namespace Company\ACL\UserAcl\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;

class UserAclFilter implements InputFilterAwareInterface
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
                        'name'     => 'iduseracl',
                        'required' => false,
                        'filters'  => array(
                                        array('name' => 'Int'),
                        ),
                    ));
                    
                    $inputFilter->add(array(
                        'name'     => 'iduser',
                        'required' => false,
                        'filters'  => array(
                                array('name' => 'Int'),
                        ),
                    ));

                    $inputFilter->add($factory->createInput(array(
                        'name' => 'module_name',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim')
                        ),
                        'validators' => array(
                            array(
                                'name' => 'Zend\Validator\InArray',
                                'options' => array(
                                    'haystack' => array('basic','sales','company','manufacture','contents'),
                                    'messages' => array(
                                        'notInArray' => 'is not a valid input. Valid inputs: basic | sales | company | manufacture | contents '
                                     ),
                                ),
                            ),
                        ),
                    )));
                    
                    $inputFilter->add(array(
                        'name' => 'user_accesslevel',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim')
                        ),
                        'validators' => array(
                            array(
                                'name' => 'Zend\Validator\InArray',
                                'options' => array(
                                    'haystack' => array('1','2','3','4','5'),
                                    'messages' => array(
                                        'notInArray' => 'is not a valid input. Valid inputs: 1 | 2 | 3 | 4 | 5 '
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

