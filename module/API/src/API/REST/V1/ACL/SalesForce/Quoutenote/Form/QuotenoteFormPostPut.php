<?php

/**
 * QuotenoteFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Quotenote\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Quotenote\Form\QuotenoteForm;

/**
 * Class QuotenoteFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Quotenote\Form
 */
class QuotenoteFormPostPut{

    /**
     * @param $userLevel
     * @return QuotenoteForm
     */
    public static function init($userLevel){

        $QuotenoteForm = new QuotenoteForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $QuotenoteForm->remove('quotenote_note');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $QuotenoteForm;
    }

}