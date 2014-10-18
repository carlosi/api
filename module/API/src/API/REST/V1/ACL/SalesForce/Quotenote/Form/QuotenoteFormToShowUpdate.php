<?php

/**
 * QuotenoteFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 16/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Quotenote\Form;

// - ACL -- //
use API\REST\V1\ACL\Salesforce\Quotenote\Form\QuotenoteForm;

/**
 * Class QuotenoteFormToShowUpdate
 * @package API\REST\V1\ACL\Salesforce\Quotenote\Form
 */
class QuotenoteFormToShowUpdate{

    /**
     * @param $userLevel
     * @return QuotenoteForm
     */
    public static function init($userLevel){

        $quotenoteForm = new QuotenoteForm();

        switch ($userLevel){

            case 5: {

                $quotenoteForm->remove('idquotenote');
                $quotenoteForm->remove('idquote');
                $quotenoteForm->remove('iduser');

                break;
            }

            case 4: {

                $quotenoteForm->remove('idquotenote');
                $quotenoteForm->remove('idquote');
                $quotenoteForm->remove('iduser');

                break;
            }

            case 3: {

                $quotenoteForm->remove('idquotenote');
                $quotenoteForm->remove('idquote');
                $quotenoteForm->remove('iduser');

                break;
            }

            case 2: {

                $quotenoteForm->remove('idquotenote');
                $quotenoteForm->remove('idquote');
                $quotenoteForm->remove('iduser');

                break;
            }

            case 1: {

                $quotenoteForm->remove('idquotenote');
                $quotenoteForm->remove('idquote');
                $quotenoteForm->remove('iduser');

                break;
            }
        }

        return $quotenoteForm;
    }

}