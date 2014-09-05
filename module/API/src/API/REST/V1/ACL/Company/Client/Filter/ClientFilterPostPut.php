<?php

/**
 * ClientFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Client\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Client\Filter\ClientFilter;

/**
 * Class ClientFilterPostPut
 * @package API\REST\V1\ACL\Company\Client\Filter
 */
class ClientFilterPostPut
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
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $clientFilter = new ClientFilter();
        $inputFilter = $clientFilter->getInputFilter();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $inputFilter->remove('client_password');
                $inputFilter->remove('client_status');
                $inputFilter->add(array(
                    'name' => 'client_status',
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
                                    'notInArray' => 'is not a valid input. Valid inputs: pending | active'
                                ),
                            ),
                        ),
                    ),
                ));

                $inputFilter->remove('client_type');
                $inputFilter->add(array(
                    'name' => 'client_type',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('NORMAL'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: NORMAL'
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

