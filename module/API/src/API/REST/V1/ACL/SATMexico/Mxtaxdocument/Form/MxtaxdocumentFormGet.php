<?php

/**
 * MxtaxdocumentFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form;

// - ACL - //
use API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form\MxtaxdocumentForm;

/**
 * Class MxtaxdocumentFormGET
 * @package API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form
 */
class MxtaxdocumentFormGET
{
    /**
     * @param $userlevel
     * @return MxtaxdocumentForm
     */
    public static function init($userlevel){
        $MxtaxdocumentForm = new MxtaxdocumentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $MxtaxdocumentForm->remove('Mxtaxdocument_folio');
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