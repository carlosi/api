<?php
namespace Company\ACL\Company\Form;

use Company\ACL\Company\Form\CompanyForm;

class CompanyFormPostPut{

    public static function init($userLevel){

        $clientTaxForm = new CompanyForm();

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

        return $clientTaxForm;
    }

}

