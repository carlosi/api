<?php

/**
 * ProductionteamFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionteam\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionteam\Form\ProductionteamForm;

/**
 * Class ProductionteamFormGET
 * @package API\REST\V1\ACL\Production\Productionteam\Form
 */
class ProductionteamFormGET{

    /**
     * @param $userlevel
     * @return ProductionteamForm
     */
    public static function init($userlevel){

        $ProductionteamForm = new ProductionteamForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ProductionteamForm->remove('Productionteam_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $ProductionteamForm;
    }
}