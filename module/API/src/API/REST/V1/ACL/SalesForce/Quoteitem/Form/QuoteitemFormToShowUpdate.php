<?php

/**
 * QuoteitemFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 17/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quoteitem\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Quoteitem\Form\QuoteitemForm;

/**
 * Class QuoteitemFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Quoteitem\Form
 */
class QuoteitemFormToShowUpdate{

    /**
     * @param $userLevel
     * @return QuoteitemForm
     */
    public static function init($userLevel){

        $quoteitemForm = new QuoteitemForm();

        switch ($userLevel){

            case 5: {

                $quoteitemForm->remove('idquoteitem');
                $quoteitemForm->remove('idquote');
                $quoteitemForm->remove('idproduct');

                break;
            }

            case 4: {

                $quoteitemForm->remove('idquoteitem');
                $quoteitemForm->remove('idquote');
                $quoteitemForm->remove('idproduct');

                break;
            }

            case 3: {

                $quoteitemForm->remove('idquoteitem');
                $quoteitemForm->remove('idquote');
                $quoteitemForm->remove('idproduct');

                break;
            }

            case 2: {

                $quoteitemForm->remove('idquoteitem');
                $quoteitemForm->remove('idquote');
                $quoteitemForm->remove('idproduct');

                break;
            }

            case 1: {

                $quoteitemForm->remove('idquoteitem');
                $quoteitemForm->remove('idquote');
                $quoteitemForm->remove('idproduct');

                break;
            }
        }

        return $quoteitemForm;
    }

}