<?php

/**
 * QuotenoteFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quotenote\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Quotenote\Form\QuotenoteForm;

/**
 * Class QuotenoteFormGET
 * @package API\REST\V1\ACL\Salesforce\Quotenote\Form
 */
class QuotenoteFormGET
{
    /**
     * @param $userlevel
     * @return QuotenoteForm
     */
    public static function init($userlevel){

        $quotenoteForm = new QuotenoteForm();

        switch ($userlevel){
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
        return $quotenoteForm;
    }
}