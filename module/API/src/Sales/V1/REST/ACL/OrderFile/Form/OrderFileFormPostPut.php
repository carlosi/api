<?php
namespace Sales\V1\REST\ACL\OrderFile\Form;

use Sales\V1\REST\ACL\OrderFile\Form\OrderFileForm;

class OrderFileFormPostPut{

    public static function init($userLevel){

        $orderFileForm = new OrderFileForm();

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

        return $orderFileForm;
    }

}