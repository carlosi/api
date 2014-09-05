<?php

/**
 * ClientcommentFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientcomment\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentForm;

/**
 * Class ClientcommentFormPostPut
 * @package API\REST\V1\ACL\Company\Clientcomment\Form
 */
class ClientcommentFormPostPut{

    /**
     * @param $userLevel
     * @return ClientcommentForm
     */
    public static function init($userLevel){

        $ClientcommentForm = new ClientcommentForm();

        switch ($userLevel){

            case 5: {


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

        return $ClientcommentForm;
    }

}

