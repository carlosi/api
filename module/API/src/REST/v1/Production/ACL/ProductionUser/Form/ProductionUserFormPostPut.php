<?php
namespace REST\v1\Production\ACL\ProductionUser\Form;

use REST\v1\Production\ACL\ProductionUser\Form\ProductionUserForm;

class ProductionUserFormPostPut{

    public static function init($userLevel){

        $productionUserForm = new ProductionUserForm();

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

        return $productionUserForm;
    }

}

