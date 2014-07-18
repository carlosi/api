<?php

namespace Sales\ACL\OrderRecord\Form;

use Sales\ACL\OrderRecord\Form\OrderRecordForm;

class OrderRecordFormGET
{
    public static function init($userlevel){

        $orderRecordForm = new OrderRecordForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderRecordForm->remove('orderrecord_date');
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