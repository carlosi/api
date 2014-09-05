<?php

/**
 * MlquestionFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\MercadoLibre\Mlquestion\Form;

// - ACL - //
use API\REST\V1\ACL\MercadoLibre\Mlquestion\Form\MlquestionForm;

/**
 * Class MlquestionFormPostPut
 * @package API\REST\V1\ACL\MercadoLibre\Mlquestion\Form
 */
class MlquestionFormPostPut{

    /**
     * @param $userLevel
     * @return MlquestionForm
     */
    public static function init($userLevel){

        $MlquestionForm = new MlquestionForm();

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

        return $MlquestionForm;
    }

}

