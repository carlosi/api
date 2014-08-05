<?php

namespace Sales\ACL\OrderFile\Form;

use Sales\ACL\OrderFile\Form\OrderFileForm;

class OrderFileFormGET
{
    public static function init($userlevel){

        $orderFileForm = new OrderFileForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $orderFileForm->remove('orderfile_note');
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