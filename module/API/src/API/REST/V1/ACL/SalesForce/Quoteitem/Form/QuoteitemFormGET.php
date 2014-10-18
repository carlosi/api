<?php

/**
 * QuoteitemFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quoteitem\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Quoteitem\Form\QuoteitemForm;

/**
 * Class QuoteitemFormGET
 * @package API\REST\V1\ACL\Salesforce\Quoteitem\Form
 */
class QuoteitemFormGET
{
    /**
     * @param $userlevel
     * @return QuoteitemForm
     */
    public static function init($userlevel){

        $QuoteitemForm = new QuoteitemForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $QuoteitemForm->remove('orderquote_endvalue');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $QuoteitemForm;
    }
}