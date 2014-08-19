<?php

/**
 * UserFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\User\Form;

// - ACL - //
use API\REST\V1\ACL\Company\User\Form\UserForm;

/**
 * Class UserFormPostPut
 * @package API\REST\V1\ACL\Company\User\Form
 */
class UserFormPostPut{

    /**
     * @param $userLevel
     * @return UserForm
     */
    public static function init($userLevel){

        $userForm = new UserForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $userForm->remove('user_status');
                $userForm->remove('user_password');

                $userForm->add(array(
                    'type' => 'Select',
                    'name' => 'user_status',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('pending','active'),
                    ),
                ));
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $userForm;
    }

}

