<?php
namespace Company\ACL\User;

use Company\ACL\User\UserForm;

class UserFormPOST{

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
                
                $this->add(array(
                    'type' => 'Select',
                    'name' => 'user_status',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('pending','active'),
                    ),
                ));
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

