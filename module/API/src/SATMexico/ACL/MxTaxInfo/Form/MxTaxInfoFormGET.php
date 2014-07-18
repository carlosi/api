<?php

namespace SATMexico\ACL\MxTaxInfo\Form;

use SATMexico\ACL\MxTaxInfo\Form\MxTaxInfoForm;

class MxTaxInfoFormGET
{
    public static function init($userlevel){
        $mxTaxInfoForm = new MxTaxInfoForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $mxTaxInfoForm->remove('mxtaxinfo_rfc');
                break;
            }
            case 2: {

                break;
            }
            case 2: {

            }
        }

        return $mxTaxInfoForm;
    }
}