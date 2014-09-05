<?php

/**
 * CompanyFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Company\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Company\Form\CompanyForm;

/**
 * Class CompanyFormGET
 * @package API\REST\V1\ACL\Company\Company\Form
 */
class CompanyFormGET
{
    /**
     * @param $userlevel
     * @return CompanyForm
     */
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