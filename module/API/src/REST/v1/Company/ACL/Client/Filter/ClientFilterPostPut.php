<?php

namespace REST\v1\Company\ACL\Client\Filter;

use REST\v1\Company\ACL\Client\Filter\ClientFilter;


class ClientFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

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

