<?php

/**
 * ClientfileFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 1/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientfile\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Clientfile\Form\ClientfileForm;

/**
 * Class ClientfileFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Clientfile\Form
 */
class ClientfileFormToShowUpdate{

    /**
     * @param $userLevel
     * @return ClientfileForm
     */
    public static function init($userLevel){

        $clientfileForm = new ClientfileForm();

        switch ($userLevel){

            case 5: {

                $clientfileForm->remove('idclientfile');

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

        return $clientfileForm;
    }

}