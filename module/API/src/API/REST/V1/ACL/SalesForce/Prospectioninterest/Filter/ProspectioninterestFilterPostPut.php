<?php

/**
 * ProspectioninterestFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 17/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Prospectioninterest\Filter;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Filter\ProspectioninterestFilter;

/**
 * Class ProspectioninterestFilterPostPut
 * @package API\REST\V1\ACL\Salesforce\Prospectioninterest\Filter
 */
class ProspectioninterestFilterPostPut
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
        $ProspectioninterestFilter = new ProspectioninterestFilter();
        $inputFilter = $ProspectioninterestFilter->getInputFilter();

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

