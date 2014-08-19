<?php

/**
 * ClienttaxFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Clienttax\Form;

// - ACL - //
use API\REST\V1\ACL\SATMexico\Clienttax\Form\ClienttaxForm;

/**
 * Class ClienttaxFormPostPut
 * @package API\REST\V1\ACL\SATMexico\Clienttax\Form
 */
class ClienttaxFormPostPut{

    /**
     * @param $userLevel
     * @return ClienttaxForm
     */
    public static function init($userLevel){

        $ClienttaxForm = new ClienttaxForm();

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

        return $ClienttaxForm;
    }

}

