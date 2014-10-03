<?php

/**
 * CompanyFormToShowUpdate.php
 * BuyBuy
 *
 * Created by Buybuy on 1/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Company\Form;

// - ACL -- //
use API\REST\V1\ACL\Company\Company\Form\CompanyForm;

/**
 * Class CompanyFormToShowUpdate
 * @package API\REST\V1\ACL\Company\Company\Form
 */
class CompanyFormToShowUpdate{

    /**
     * @param $userLevel
     * @return CompanyForm
     */
    public static function init($userLevel){

        $companyForm = new CompanyForm();

        switch ($userLevel){

            case 5: {

                $companyForm->remove('idcompany');

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