<?php
namespace REST\v1\Production\ACL\ProductionTeam\Form;

use REST\v1\Production\ACL\ProductionTeam\Form\ProductionTeamForm;

class ProductionTeamFormPostPut{

    public static function init($userLevel){

        $productionTeamForm = new ProductionTeamForm();

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

        return $productionTeamForm;
    }

}

