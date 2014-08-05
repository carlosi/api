<?php 

namespace Company\ACL\User\Filter;

use Company\ACL\User\Filter\UserFilter;


class UserFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }
    
    public function getInputFilter($userLevel)
    {
        $inputFilter = new UserFilter();
        $inputFilter = $inputFilter->getInputFilter();
           
        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {
                
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
                                    'haystack' => array('pending','active'),
                                    'messages' => array(
                                        'notInArray' => 'is not a valid input. Valid inputs: pending | active  '
                                    ),
                                ),
                            ),
                        ),
                ));
                
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $inputFilter;
    }
}

?>

