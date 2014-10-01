<?php

/**
 * ClientcommentFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 1/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientcomment\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentForm;

/**
 * Class ClientcommentFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Clientcomment\Form
 */
class ClientcommentFormToShowUpdate{

    /**
     * @param $userLevel
     * @return ClientcommentForm
     */
    public static function init($userLevel){

        $clientcommentForm = new ClientcommentForm();

        switch ($userLevel){

            case 5: {

                $clientcommentForm->remove('idclientcomment');

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

        return $clientcommentForm;
    }

}