<?php

/**
 * CompanyddressFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Companyaddress\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressForm;

/**
 * Class CompanyaddressFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Companyaddress\Form
 */
class CompanyaddressFormToShowUpdate{

    /**
     * @param $userLevel
     * @return CompanyaddressForm
     */
    public static function init($userLevel){

        $companyaddressForm = new CompanyaddressForm();

        switch ($userLevel){

            case 5: {

                $companyaddressForm->remove('idcompanyaddress');

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

        return $companyaddressForm;
    }

}