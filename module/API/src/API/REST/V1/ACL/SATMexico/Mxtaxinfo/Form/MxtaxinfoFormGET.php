<?php

/**
 * MxtaxinfoFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form;

// - ACL - //
use API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form\MxtaxinfoForm;

/**
 * Class MxtaxinfoFormGET
 * @package API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form
 */
class MxtaxinfoFormGET
{
    /**
     * @param $userlevel
     * @return MxtaxinfoForm
     */
    public static function init($userlevel){
        $MxtaxinfoForm = new MxtaxinfoForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $MxtaxinfoForm->remove('Mxtaxinfo_rfc');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $MxtaxinfoForm;
    }
}