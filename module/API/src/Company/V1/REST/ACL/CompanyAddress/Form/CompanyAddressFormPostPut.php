<?php
namespace Company\V1\REST\ACL\CompanyAddress\Form;

use Company\V1\REST\ACL\CompanyAddress\Form\CompanyAddressForm;

class CompanyAddressFormPostPut{

    public static function init($userLevel){

        $companyAddressForm = new CompanyAddressForm();

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

        return $companyAddressForm;
    }

}

