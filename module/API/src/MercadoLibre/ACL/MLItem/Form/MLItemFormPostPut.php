<?php
namespace MercadoLibre\ACL\MLItem\Form;

use MercadoLibre\ACL\MLItem\Form\MLItemForm;

class MLItemFormPostPut{

    public static function init($userLevel){

        $mlItemForm = new MLItemForm();

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

        return $mlItemForm;
    }

}

