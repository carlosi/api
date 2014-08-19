<?php

/**
 * ProductionlineFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionline\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionline\Form\ProductionlineForm;

/**
 * Class ProductionlineFormGET
 * @package API\REST\V1\ACL\Production\Productionline\Form
 */
class ProductionlineFormGET{

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

                $ProductionlineForm->remove('Productionline_name');
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

