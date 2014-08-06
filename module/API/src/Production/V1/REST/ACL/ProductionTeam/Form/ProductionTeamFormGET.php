<?php

namespace Production\V1\REST\ACL\ProductionTeam\Form;

use Production\V1\REST\ACL\ProductionTeam\ProductionTeamForm;

class ProductionTeamFormGET{

    public static function init($userlevel){

        $productionTeamForm = new ProductionTeamForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $productionTeamForm->remove('productionteam_name');
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