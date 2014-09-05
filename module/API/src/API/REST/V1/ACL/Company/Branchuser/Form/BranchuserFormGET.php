<?php

/**
 * BranchuserFormGET.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Branchuser\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Branchuser\Form\BranchuserForm;

/**
 * Class BranchuserFormGET
 * @package API\REST\V1\ACL\Company\Branchuser\Form
 */
class BranchuserFormGET
{
    /**
     * @param $userlevel
     * @return BranchuserForm
     */
    public static function init($userlevel){

        $BranchuserForm = new BranchuserForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $BranchuserForm->remove('idbranch');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $BranchuserForm;
    }
}