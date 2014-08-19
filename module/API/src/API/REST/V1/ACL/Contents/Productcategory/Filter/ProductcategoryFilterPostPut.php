<?php

/**
 * ProductcategoryFilterPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productcategory\Filter;

// - ACL - //
use API\REST\V1\ACL\Contents\Productcategory\Filter\ProductcategoryFilter;

/**
 * Class ProductcategoryFilterPostPut
 * @package API\REST\V1\ACL\Contents\Productcategory\Filter
 */
class ProductcategoryFilterPostPut
{
    /**
     * @param $userLevel
     * @return \Zend\InputFilter\InputFilter|\Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter($userLevel)
    {
        $ProductcategoryFilter = new ProductcategoryFilter();
        $inputFilter = $ProductcategoryFilter->getInputFilter();
           
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

