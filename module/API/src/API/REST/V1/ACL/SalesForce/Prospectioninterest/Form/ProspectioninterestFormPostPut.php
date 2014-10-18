<?php

/**
 * ProspectioninterestFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Prospectioninterest\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestForm;

/**
 * Class ProspectioninterestFormPostPut
 * @package API\REST\V1\ACL\Salesforce\Prospectioninterest\Form
 */
class ProspectioninterestFormPostPut{

    /**
     * @param $userLevel
     * @return ProspectioninterestForm
     */
    public static function init($userLevel){

        $ProspectioninterestForm = new ProspectioninterestForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $ProspectioninterestForm->remove('idprospectioninterest');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $ProspectioninterestForm;
    }

}