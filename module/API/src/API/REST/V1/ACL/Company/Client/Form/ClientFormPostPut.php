<?php

/**
 * ClientFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Client\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Client\Form\ClientForm;

/**
 * Class ClientFormPostPut
 * @package API\REST\V1\ACL\Company\Client\Form
 */
class ClientFormPostPut
{
    /**
     * @param $userLevel
     * @return ClientForm
     */
    public static function init($userLevel){

        $clientForm = new ClientForm();

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

        return $clientForm;
    }

}