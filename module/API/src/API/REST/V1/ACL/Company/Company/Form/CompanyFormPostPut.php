<?php

/**
 * CompanyFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Company\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Company\Form\CompanyForm;

/**
 * Class CompanyFormPostPut
 * @package API\REST\V1\ACL\Company\Company\Form
 */
class CompanyFormPostPut{

    /**
     * @param $userLevel
     * @return CompanyForm
     */
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

