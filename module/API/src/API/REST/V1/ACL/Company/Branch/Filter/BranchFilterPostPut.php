<?php

/**
 * BranchFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branch\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Branch\Filter\BranchFilter;

/**
 * Class BranchFilterPostPut
 * @package API\REST\V1\ACL\Company\Branch\Filter
 */
class BranchFilterPostPut
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
        $branchFilter = new BranchFilter();
        $inputFilter = $branchFilter->getInputFilter();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $inputFilter->remove('branch_iso_codecountry');
                $inputFilter->add(array(
                    'name' => 'branch_iso_codecountry',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('MX','US','ES','AUS'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: MX | US | ES | AUS'
                                ),
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 45,
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

