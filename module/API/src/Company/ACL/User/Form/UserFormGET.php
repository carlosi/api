<?php
namespace Company\ACL\User\Form;

use Company\ACL\User\Form\UserForm;

class UserFormGET{

    public static function init($userLevel){

        $userForm = new UserForm();

        switch ($userLevel){

            case 5: {

                $userForm->remove('user_password');
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

