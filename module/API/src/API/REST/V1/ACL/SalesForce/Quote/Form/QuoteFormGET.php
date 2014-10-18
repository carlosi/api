<?php

/**
 * QuoteFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 16/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quote\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteForm;

/**
 * Class QuoteFormGET
 * @package API\REST\V1\ACL\Salesforce\Quote\Form
 */
class QuoteFormGET
{
    /**
     * @param $userlevel
     * @return QuoteForm
     */
    public static function init($userlevel){

        $QuoteForm = new QuoteForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $QuoteForm->remove('quote_dateexpiration');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $QuoteForm;
    }
}