<?php

/**
 * QuoteitemFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Quoteitem\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Quoteitem\Form\QuoteitemForm;

/**
 * Class QuoteitemFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Quoteitem\Form
 */
class QuoteitemFormPostPut{

    /**
     * @param $userLevel
     * @return QuoteitemForm
     */
    public static function init($userLevel){

        $QuoteitemForm = new QuoteitemForm();

        switch ($userLevel){

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