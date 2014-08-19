<?php

/**
 * ProductionuserFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionuser\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionuser\Form\ProductionuserForm;

/**
 * Class ProductionuserFormGET
 * @package API\REST\V1\ACL\Production\Productionuser\Form
 */
class ProductionuserFormGET{

    /**
     * @param $userlevel
     * @return ProductionuserForm
     */
    public static function init($userlevel){

        $ProductionuserForm = new ProductionuserForm();

        switch($userlevel){

            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ProductionuserForm->remove('iduser');
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