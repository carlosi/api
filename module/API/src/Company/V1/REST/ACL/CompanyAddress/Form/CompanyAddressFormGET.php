<?php

namespace Company\V1\REST\ACL\CompanyAddress\Form;

use Company\V1\REST\ACL\CompanyAddress\Form\CompanyAddressForm;

class CompanyAddressFormGET
{
    public static function init($userlevel){
        $companyAddressForm = new CompanyAddressForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $companyAddressForm->remove('companyaddress_address');
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