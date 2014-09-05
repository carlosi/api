<?php

/**
 * QuoteitemFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Quoteitem\Filter;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Quoteitem\Filter\QuoteitemFilter;

/**
 * Class QuoteitemFilterPostPut
 * @package API\REST\V1\ACL\SalesForce\Quoteitem\Filter
 */
class QuoteitemFilterPostPut
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
        $QuoteitemFilter = new QuoteitemFilter();
        $inputFilter = $QuoteitemFilter->getInputFilter();

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

