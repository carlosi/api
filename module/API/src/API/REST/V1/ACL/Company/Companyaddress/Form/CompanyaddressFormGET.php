<?php

/**
 * CompanyaddressFormGET.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Companyaddress\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressForm;

/**
 * Class CompanyaddressFormGET
 * @package API\REST\V1\ACL\Company\Companyaddress\Form
 */
class CompanyaddressFormGET
{
    /**
     * @param $userlevel
     * @return CompanyaddressForm
     */
    public static function init($userlevel){
        $CompanyaddressForm = new CompanyaddressForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {
                $CompanyaddressForm->remove('Companyaddress_address');
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