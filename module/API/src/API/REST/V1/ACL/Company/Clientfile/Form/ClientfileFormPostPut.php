<?php

/**
 * ClientfileFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientfile\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Clientfile\Form\ClientfileForm;

/**
 * Class ClientfileFormPostPut
 * @package API\REST\V1\ACL\Company\Clientfile\Form
 */
class ClientfileFormPostPut{

    /**
     * @param $userLevel
     * @return ClientfileForm
     */
    public static function init($userLevel){

        $ClientfileForm = new ClientfileForm();

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

        return $ClientfileForm;
    }

}

