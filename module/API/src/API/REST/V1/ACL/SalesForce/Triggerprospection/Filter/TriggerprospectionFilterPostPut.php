<?php

/**
 * TriggerprospectionFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Triggerprospection\Filter;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Triggerprospection\Filter\TriggerprospectionFilter;

/**
 * Class TriggerprospectionFilterPostPut
 * @package API\REST\V1\ACL\Salesforce\Triggerprospection\Filter
 */
class TriggerprospectionFilterPostPut
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
        $TriggerprospectionFilter = new TriggerprospectionFilter();
        $inputFilter = $TriggerprospectionFilter->getInputFilter();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

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

