<?php

/**
 * ClientcommentFilterPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */
namespace API\REST\V1\ACL\Company\Clientcomment\Filter;

// - ACL - //
use API\REST\V1\ACL\Company\Clientcomment\Filter\ClientcommentFilter;

/**
 * Class ClientcommentFilterPostPut
 * @package API\REST\V1\ACL\Company\Clientcomment\Filter
 */
class ClientcommentFilterPostPut
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
        $ClientcommentFilter = new ClientcommentFilter();
        $inputFilter = $ClientcommentFilter->getInputFilter();
           
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

