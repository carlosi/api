<?php

/**
 * ProductionlineFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionline\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionline\Form\ProductionlineForm;

/**
 * Class ProductionlineFormPostPut
 * @package API\REST\V1\ACL\Production\Productionline\Form
 */
class ProductionlineFormPostPut{

    /**
     * @param $userLevel
     * @return ProductionlineForm
     */
    public static function init($userLevel){

        $ProductionlineForm = new ProductionlineForm();

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

        return $ProductionlineForm;
    }

}

