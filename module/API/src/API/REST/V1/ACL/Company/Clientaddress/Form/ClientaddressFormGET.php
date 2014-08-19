<?php


/**
 * ClientaddressFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientaddress\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressForm;

/**
 * Class ClientaddressFormGET
 * @package API\REST\V1\ACL\Company\Clientaddress\Form
 */
class ClientaddressFormGET
{
    /**
     * @param $userlevel
     * @return ClientaddressForm
     */
    public static function init($userlevel){

        $ClientaddressForm = new ClientaddressForm();

        switch ($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ClientaddressForm->remove('Clientaddress_addressee');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $ClientaddressForm;
    }
}