<?php

/**
 * ClientfileFormGET.php
 * * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientfile\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Clientfile\Form\ClientfileForm;

/**
 * Class ClientfileFormGET
 * @package API\REST\V1\ACL\Company\Clientfile\Form
 */
class ClientfileFormGET
{
    /**
     * @param $userlevel
     * @return ClientfileForm
     */
    public static function init($userlevel){

        $ClientfileForm = new ClientfileForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4 :{

                break;
            }
            case 3: {
                $ClientfileForm->remove('Clientfile_url');
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $ClientfileForm;
    }
}