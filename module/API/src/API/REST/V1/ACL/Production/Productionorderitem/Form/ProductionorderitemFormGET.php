<?php

/**
 * ProductionorderitemFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionorderitem\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionorderitem\Form\ProductionorderitemForm;

/**
 * Class ProductionOrderitemFormGET
 * @package API\REST\V1\ACL\Production\Productionorderitem\Form
 */
class ProductionorderitemFormGET{

    /**
     * @param $userLevel
     * @return ProductionOrderitemForm
     */
    public static function init($userLevel){

        $ProductionorderitemForm = new ProductionorderitemForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $ProductionorderitemForm->remove('productionorderitem_dateinit');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $ProductionorderitemForm;
    }

}

