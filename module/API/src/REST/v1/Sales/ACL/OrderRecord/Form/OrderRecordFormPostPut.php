<?php
namespace REST\v1\Sales\ACL\OrderRecord\Form;

use REST\v1\Sales\ACL\OrderRecord\Form\OrderRecordForm;

class OrderRecordFormPostPut{

    public static function init($userLevel){

        $orderRecordForm = new OrderRecordForm();

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

        return $orderRecordForm;
    }

}