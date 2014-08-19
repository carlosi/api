<?php

/**
 * UserFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\User\Form;

// - ACL - //
use API\REST\V1\ACL\Company\User\Form\UserForm;

/**
 * Class UserFormGET
 * @package API\REST\V1\ACL\Company\User\Form
 */
class UserFormGET{

    /**
     * @param $userLevel
     * @return UserForm
     */
    public static function init($userLevel){

        $userForm = new UserForm();

        switch ($userLevel){

            case 5: {

                $userForm->remove('user_password');
                $userForm->add(array(
                    'type' => 'Select',
                    'name' => 'user_status',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('pending','active','suspended'),
                        'label' => 'Estado',
                    ),
                ));
                break;
            }

            case 4: {

                $userForm->remove('user_password');
                break;
            }

            case 3: {

                $userForm->remove('user_password');

                $userForm->add(array(
                    'type' => 'Select',
                    'name' => 'user_status',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('pending','active','suspended'),
                        'label' => 'Estado',
                    ),
                ));
                break;
            }

            case 2: {
                $userForm->remove('user_password');
                break;
            }

            case 1: {
                $userForm->remove('user_password');
                break;
            }
        }

        return $userForm;
    }

}

