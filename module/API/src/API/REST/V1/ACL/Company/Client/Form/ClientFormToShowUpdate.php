<?php

/**
 * ClientFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Client\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Client\Form\ClientForm;

/**
 * Class ClientFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Client\Form
 */
class ClientFormToShowUpdate{

    /**
     * @param $userLevel
     * @return ClientForm
     */
    public static function init($userLevel){

        $clientForm = new ClientForm();

        switch ($userLevel){

            case 5: {

                $clientForm->remove('idclient');
                $clientForm->remove('idcompany');

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

        return $clientForm;
    }

}