<?php

namespace REST\v1\Production\ACL\ProductionUser\Form;

use REST\v1\Production\ACL\ProductionUser\Form\ProductionUserForm;

class ProductionUserFormGET{

    public static function init($userlevel){

        $productionUserForm = new ProductionUserForm();

        switch($userlevel){

            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $productionUserForm->remove('iduser');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $productionUserForm;
    }
}