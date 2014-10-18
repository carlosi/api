<?php

/**
 * ProspectioninterestFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 4/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Salesforce\Prospectioninterest\Form;

// - ACL - //
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestForm;

/**
 * Class ProspectioninterestFormGET
 * @package API\REST\V1\ACL\Salesforce\Prospectioninterest\Form
 */
class ProspectioninterestFormGET
{
    /**
     * @param $userlevel
     * @return ProspectioninterestForm
     */
    public static function init($userlevel){

        $ProspectioninterestForm = new ProspectioninterestForm();

        switch ($userlevel){
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