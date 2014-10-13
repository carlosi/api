<?php

/**
 * UserFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 10/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\User\Form;

// - ACL - //
use API\REST\V1\ACL\Company\User\Form\UserForm;

/**
 * Class UserFormToShowUpdate
 * @package API\REST\V1\ACL\Company\User\Form
 */
class UserFormToShowUpdate{

    /**
     * @param $userLevel
     * @return UserForm
     */
    public static function init($userLevel){

        $UserForm = new UserForm();

        switch ($userLevel){

            case 5: {
                $UserForm->remove('iduser');
                break;
            }

            case 4: {
                $UserForm->remove('iduser');


                break;
            }

            case 3: {
                $UserForm->remove('iduser');

                break;
            }

            case 2: {
                $UserForm->remove('iduser');

                break;
            }

            case 1: {
                $UserForm->remove('iduser');

                break;
            }
        }

        return $UserForm;
    }

}