<?php

/**
 * UserFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\User\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\User\Filter\UserFilter;

/**
 * Class UserFilterPostPut
 * @package API\REST\V1\ACL\Company\User\Filter
 */
class UserFilterPostPut
{
    /**
     * @param InputFilterInterface $inputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }

    /**
     * @param $userLevel
     * @return UserFilter|\Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
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

