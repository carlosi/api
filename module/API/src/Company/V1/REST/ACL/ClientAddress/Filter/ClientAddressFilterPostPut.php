<?php 

namespace Company\V1\REST\ACL\ClientAddress\Filter;

use Company\V1\REST\ACL\ClientAddress\Filter\ClientAddressFilter;


class ClientAddressFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }
    
    public function getInputFilter($userLevel)
    {
        $clientAddressFilter = new ClientAddressFilter();
        $inputFilter = $clientAddressFilter->getInputFilter();
           
        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $inputFilter->remove('clientaddress_iso_codecountry');
                $inputFilter->add(array(
                        'name' => 'clientaddress_iso_codecountry',
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

                $inputFilter->remove('clientaddress_iso_codephone');
                $inputFilter->add(array(
                    'name' => 'clientaddress_iso_codephone',
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

