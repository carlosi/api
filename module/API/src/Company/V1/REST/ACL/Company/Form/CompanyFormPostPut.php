<?php
namespace Company\V1\REST\ACL\Company\Form;

use Company\V1\REST\ACL\Company\Form\CompanyForm;

class CompanyFormPostPut{

    public static function init($userLevel){

        $companyForm = new CompanyForm();

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

        return $companyForm;
    }

}

