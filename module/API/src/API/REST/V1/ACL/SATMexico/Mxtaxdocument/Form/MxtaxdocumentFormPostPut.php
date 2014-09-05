<?php

/**
 * MxtaxdocumentFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form;

// - ACL - //
use API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form\MxtaxdocumentForm;

/**
 * Class MxtaxdocumentFormPostPut
 * @package API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form
 */
class MxtaxdocumentFormPostPut{

    /**
     * @param $userLevel
     * @return MxtaxdocumentForm
     */
    public static function init($userLevel){

        $MxtaxdocumentForm = new MxtaxdocumentForm();

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

        return $MxtaxdocumentForm;
    }

}

