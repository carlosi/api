<?php

/**
 * ProductionuserFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionuser\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionuser\Form\ProductionuserForm;

/**
 * Class ProductionuserFormPostPut
 * @package API\REST\V1\ACL\Production\Productionuser\Form
 */
class ProductionuserFormPostPut{

    /**
     * @param $userLevel
     * @return ProductionuserForm
     */
    public static function init($userLevel){

        $ProductionuserForm = new ProductionuserForm();

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

        return $ProductionuserForm;
    }

}

