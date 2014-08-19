<?php

/**
 * MxtaxinfoFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form;

// - ACL - //
use API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form\MxtaxinfoForm;

/**
 * Class MxtaxinfoFormPostPut
 * @package API\REST\V1\ACL\SATMexico\Mxtaxinfo\For
 */
class MxtaxinfoFormPostPut{

    /**
     * @param $userLevel
     * @return MxtaxinfoForm
     */
    public static function init($userLevel){

        $MxtaxinfoForm = new MxtaxinfoForm();

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

        return $MxtaxinfoForm;
    }

}

