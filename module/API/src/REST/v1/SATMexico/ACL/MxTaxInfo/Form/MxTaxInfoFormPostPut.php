<?php
namespace REST\v1\SATMexico\ACL\MxTaxInfo\Form;

use REST\v1\SATMexico\ACL\MxTaxInfo\Form\MxTaxInfoForm;

class MxTaxInfoFormPostPut{

    public static function init($userLevel){

        $mxTaxDocumentForm = new MxTaxInfoForm();

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

        return $mxTaxDocumentForm;
    }

}

