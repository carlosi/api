<?php
namespace MercadoLibre\V1\REST\ACL\MLItem\Form;

use MercadoLibre\V1\REST\ACL\MLItem\Form\MLItemForm;

class MLItemFormGET{

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

                $mlItemForm->remove('mlitem_id');
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

