<?php
/**
 * ProductionteamFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */
namespace API\REST\V1\ACL\Production\Productionteam\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionteam\Form\ProductionteamForm;

/**
 * Class ProductionteamFormPostPut
 * @package API\REST\V1\ACL\Production\Productionteam\Form
 */
class ProductionteamFormPostPut{

    /**
     * @param $userLevel
     * @return ProductionteamForm
     */
    public static function init($userLevel){

        $ProductionteamForm = new ProductionteamForm();

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

        return $ProductionteamForm;
    }

}

