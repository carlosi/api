<?php

/**
 * CompanyaddressFormPostPut.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Companyaddress\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressForm;

/**
 * Class CompanyaddressFormPostPut
 * @package API\REST\V1\ACL\Company\Companyaddress\Form
 */
class CompanyaddressFormPostPut{

    /**
     * @param $userLevel
     * @return CompanyaddressForm
     */
    public static function init($userLevel){

        $CompanyaddressForm = new CompanyaddressForm();

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

        return $CompanyaddressForm;
    }

}

