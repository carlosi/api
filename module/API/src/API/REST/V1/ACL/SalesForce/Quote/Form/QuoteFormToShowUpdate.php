<?php

/**
 * QuoteFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 15/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quote\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteForm;

/**
 * Class QuoteFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Quote\Form
 */
class QuoteFormToShowUpdate{

    /**
     * @param $userLevel
     * @return QuoteForm
     */
    public static function init($userLevel){

        $quoteForm = new QuoteForm();

        switch ($userLevel){

            case 5: {

                $quoteForm->remove('idquote');
                $quoteForm->remove('idtriggerprospection');

                break;
            }

            case 4: {

                $quoteForm->remove('idquote');
                $quoteForm->remove('idtriggerprospection');

                break;
            }

            case 3: {

                $quoteForm->remove('idquote');
                $quoteForm->remove('idtriggerprospection');

                break;
            }

            case 2: {

                $quoteForm->remove('idquote');
                $quoteForm->remove('idtriggerprospection');

                break;
            }

            case 1: {

                $quoteForm->remove('idquote');
                $quoteForm->remove('idtriggerprospection');

                break;
            }
        }

        return $quoteForm;
    }

}