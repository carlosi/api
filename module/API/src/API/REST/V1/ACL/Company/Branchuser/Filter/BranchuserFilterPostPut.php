<?php

/**
 * BranchuserFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchuser\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Branchuser\Filter\BranchuserFilter;

/**
 * Class BranchuserFilterPostPut
 * @package API\REST\V1\ACL\Company\Branchuser\Filter
 */
class BranchuserFilterPostPut
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
        $BranchuserFilter = new BranchuserFilter();
        $inputFilter = $BranchuserFilter->getInputFilter();

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

