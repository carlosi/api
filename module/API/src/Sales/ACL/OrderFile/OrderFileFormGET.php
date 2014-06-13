<?php

namespace Sales\ACL\OrderFile;

use Sales\ACL\OrderFile\OrderFileForm;

class OrderFileFormGET{

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

                $orderFileForm->remove('orderfile_url');
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