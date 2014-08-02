<?php
namespace REST\v1\MercadoLibre\ACL\MLItem\Form;

use REST\v1\MercadoLibre\ACL\MLItem\Form\MLItemForm;

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

