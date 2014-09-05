<?php

/**
 * TriggerprospectionnoteFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SalesForce\Triggerprospectionnote\Form;

// - ACL - //
use API\REST\V1\ACL\SalesForce\Triggerprospectionnote\Form\TriggerprospectionnoteForm;

/**
 * Class TriggerprospectionnoteFormPostPut
 * @package API\REST\V1\ACL\SalesForce\Triggerprospectionnote\Form
 */
class TriggerprospectionnoteFormPostPut{

    /**
     * @param $userLevel
     * @return TriggerprospectionnoteForm
     */
    public static function init($userLevel){

        $TriggerprospectionnoteForm = new TriggerprospectionnoteForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $TriggerprospectionnoteForm->remove('triggerprospectionnote_note');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $TriggerprospectionnoteForm;
    }

}