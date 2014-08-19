<?php

/**
 * ProductionordercommentFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Production\Productionordercomment\Form;

// - ACL - //
use API\REST\V1\ACL\Production\Productionordercomment\Form\ProductionordercommentForm;

/**
 * Class ProductionordercommentFormGET
 * @package API\REST\V1\ACL\Production\Productionordercomment\Form
 */
class ProductionordercommentFormGET{

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

                $ProductionordercommentForm->remove('Productionordercomment_comment');
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

