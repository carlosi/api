<?php

/**
 * ProductionordercommentFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionordercomment\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionordercomment\Form\ProductionordercommentForm;

/**
 * Class ProductionordercommentFormPostPut
 * @package API\REST\V1\ACL\Production\Productionordercomment\Form
 */
class ProductionordercommentFormPostPut{

    /**
     * @param $userLevel
     * @return ProductionordercommentForm
     */
    public static function init($userLevel){

        $ProductionordercommentForm = new ProductionordercommentForm();

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

        return $ProductionordercommentForm;
    }

}

