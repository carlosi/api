<?php

/**
 * ProductionstatusFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionstatus\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionstatus\Form\ProductionstatusForm;

/**
 * Class ProductionstatusFormGET
 * @package API\REST\V1\ACL\Production\Productionstatus\Form
 */
class ProductionstatusFormGET{

    /**
     * @param $userLevel
     * @return ProductionstatusForm
     */
    public static function init($userLevel){

        $ProductionstatusForm = new ProductionstatusForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $ProductionstatusForm->remove('Productionstatus_name');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $ProductionstatusForm;
    }

}

