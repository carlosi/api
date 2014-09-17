<?php

/**
 * ClientaddressFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientaddress\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressForm;

/**
 * Class ClientaddressFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Clientaddress\Form
 */
class ClientaddressFormToShowUpdate{

    /**
     * @param $userLevel
     * @return ClientaddressForm
     */
    public static function init($userLevel){

        $clientaddressForm = new ClientaddressForm();

        switch ($userLevel){

            case 5: {

                $clientaddressForm->remove('idclientaddress');
                $clientaddressForm->remove('idcompany');

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

        return $clientaddressForm;
    }

}