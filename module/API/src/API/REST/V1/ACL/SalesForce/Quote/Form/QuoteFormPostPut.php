<?php

/**
 * QuoteFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quote\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteForm;

/**
 * Class QuoteFormPostPut
 * @package API\REST\V1\ACL\Salesforce\Quote\Form
 */
class QuoteFormPostPut{

    /**
     * @param $userLevel
     * @return QuoteForm
     */
    public static function init($userLevel){

        $QuoteForm = new QuoteForm();

        switch ($userLevel){

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