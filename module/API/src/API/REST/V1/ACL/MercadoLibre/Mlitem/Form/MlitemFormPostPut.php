<?php
/**
 * MlitemFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\MercadoLibre\Mlitem\Form;

// - ACL - //
use API\REST\V1\ACL\MercadoLibre\Mlitem\Form\MlitemForm;

/**
 * Class MlitemFormPostPut
 * @package API\REST\V1\ACL\MercadoLibre\Mlitem\Form
 */
class MlitemFormPostPut{
    /**
     * @param $userLevel
     * @return MlitemForm
     */
    public static function init($userLevel){

        $MlitemForm = new MlitemForm();

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

        return $MlitemForm;
    }

}

