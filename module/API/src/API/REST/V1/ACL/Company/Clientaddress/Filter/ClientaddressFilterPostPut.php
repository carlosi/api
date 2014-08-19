<?php


/**
 * ClientaddressFilter.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientaddress\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Clientaddress\Filter\ClientaddressFilter;

/**
 * Class ClientaddressFilterPostPut
 * @package API\REST\V1\ACL\Company\Clientaddress\Filter
 */
class ClientaddressFilterPostPut
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
        $ClientaddressFilter = new ClientaddressFilter();
        $inputFilter = $ClientaddressFilter->getInputFilter();
           
        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $inputFilter->remove('Clientaddress_iso_codecountry');
                $inputFilter->add(array(
                        'name' => 'Clientaddress_iso_codecountry',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim')
                        ),
                        'validators' => array(
                            array(
                                'name' => 'Zend\Validator\InArray',
                                'options' => array(
                                    'haystack' => array('MX'),
                                    'messages' => array(
                                        'notInArray' => 'is not a valid input. Valid inputs: MX '
                                    ),
                                ),
                            ),
                        ),
                ));

                $inputFilter->remove('Clientaddress_iso_codephone');
                $inputFilter->add(array(
                    'name' => 'Clientaddress_iso_codephone',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('+52'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: +52 '
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

