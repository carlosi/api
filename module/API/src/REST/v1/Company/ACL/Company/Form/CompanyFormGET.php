<?php

namespace REST\v1\Company\ACL\Company\Form;

use REST\v1\Company\ACL\Company\Form\CompanyForm;

class CompanyFormGET
{
    public static function init($userlevel){
        $companyForm = new CompanyForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $companyForm->remove('company_iso_codecountry');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }
        return $companyForm;
    }
}