<?php

/**
 * ClienttaxFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Clienttax\Form;

// - ACL - //
use API\REST\V1\ACL\SATMexico\Clienttax\Form\ClienttaxForm;

/**
 * Class ClienttaxFormGET
 * @package API\REST\V1\ACL\SATMexico\Clienttax\Form
 */
class ClienttaxFormGET
{
    /**
     * @param $userlevel
     * @return ClienttaxForm
     */
    public static function init($userlevel){
        $ClienttaxForm = new ClienttaxForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ClienttaxForm->remove('Clienttax_name');
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