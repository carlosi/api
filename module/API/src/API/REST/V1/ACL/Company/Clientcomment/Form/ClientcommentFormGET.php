<?php

/**
 * ClientcommentFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientcomment\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentForm;

/**
 * Class ClientcommentFormGET
 * @package API\REST\V1\ACL\Company\Clientcomment\Form
 */
class ClientcommentFormGET
{
    /**
     * @param $userlevel
     * @return ClientcommentForm
     */
    public static function init($userlevel){

        $ClientcommentFormGET = new ClientcommentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $ClientcommentFormGET->remove('Clientcomment_note');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $ClientcommentFormGET;
    }
}