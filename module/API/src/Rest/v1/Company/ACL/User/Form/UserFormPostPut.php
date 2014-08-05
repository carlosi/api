<?php
namespace Company\ACL\User\Form;

use Company\ACL\User\Form\UserForm;

class UserFormPostPut{

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

